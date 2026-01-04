<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perhitungan extends Model
{
    use HasFactory;

    // Hitung matrix ternormalisasi PROMETHEE
    public static function normalisasi($penilaians, $kriterias)
    {
        $normalisasiMatrix = [];

        foreach ($penilaians->groupBy('penginapan_id') as $penginapanId => $nilaiPenginapan) {
            foreach ($kriterias as $kriteria) {
                $nilai = $nilaiPenginapan->first(function($item) use ($kriteria) {
                    return $item->subkriteria->kriteria_id == $kriteria->id;
                });

                $xij = $nilai->subkriteria->subkriteria_berat ?? 0;

                $normalisasiMatrix[$penginapanId][$kriteria->id] = $xij;
            }
        }

        return $normalisasiMatrix;
    }

    // Hitung PROMETHEE
    public static function hitungPROMETHEE($penginapans, $kriterias, $penilaians)
    {
        $hasil = [];
        $n = count($penginapans);

        $matrixX = self::normalisasi($penilaians, $kriterias);

        foreach ($penginapans as $a) {
            $phiPlus = 0;
            $phiMinus = 0;

            foreach ($penginapans as $b) {
                if ($a->id == $b->id) continue;

                $prefAB = 0;
                $prefBA = 0;

                foreach ($kriterias as $k) {
                    $nilaiA = $matrixX[$a->id][$k->id] ?? 0;
                    $nilaiB = $matrixX[$b->id][$k->id] ?? 0;

                    if ($k->kriteria_jenis === 'Cost') {
                        $dAB = max(0, $nilaiB - $nilaiA);
                        $dBA = max(0, $nilaiA - $nilaiB);
                    } else { // Benefit
                        $dAB = max(0, $nilaiA - $nilaiB);
                        $dBA = max(0, $nilaiB - $nilaiA);
                    }

                    // Terapkan bobot normalisasi
                    $prefAB += $dAB * $k->bobot_normalisasi;
                    $prefBA += $dBA * $k->bobot_normalisasi;
                }

                $phiPlus += $prefAB;
                $phiMinus += $prefBA;
            }

            $phiPlus  = round($phiPlus / ($n - 1), 4);
            $phiMinus = round($phiMinus / ($n - 1), 4);
            $phiNet   = round($phiPlus - $phiMinus, 4);

            $hasil[$a->id] = [
                'leaving'  => $phiPlus,
                'entering' => $phiMinus,
                'net'      => $phiNet,
            ];
        }

        return $hasil;
    }
}
