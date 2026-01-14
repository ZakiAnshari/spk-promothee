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
        // Build raw matrix: average score per penginapan per kriteria
        $raw = [];
        $penginapanIds = $penilaians->pluck('penginapan_id')->unique();

        foreach ($penginapanIds as $pid) {
            $group = $penilaians->where('penginapan_id', $pid);
            foreach ($kriterias as $k) {
                $values = $group->filter(function($item) use ($k) {
                    return optional($item->subkriteria)->kriteria_id == $k->id;
                })->map(function($item) {
                    return optional($item->subkriteria)->subkriteria_berat ?? 0;
                })->values();

                $raw[$pid][$k->id] = $values->count() ? ($values->sum() / $values->count()) : 0;
            }
        }

        // Min-max normalization per kriteria. For Cost criteria, invert so higher is better.
        $normalisasiMatrix = [];
        foreach ($kriterias as $k) {
            $kId = $k->id;
            $col = array_map(function($row) use ($kId) { return $row[$kId]; }, $raw);
            $min = count($col) ? min($col) : 0;
            $max = count($col) ? max($col) : 0;

            foreach ($raw as $pid => $row) {
                $x = $row[$kId] ?? 0;
                if ($max - $min == 0) {
                    $norm = 0; // all alternatives equal for this criterion
                } else {
                    if (strtolower($k->kriteria_jenis) === 'cost') {
                        $norm = ($max - $x) / ($max - $min);
                    } else {
                        $norm = ($x - $min) / ($max - $min);
                    }
                }

                $normalisasiMatrix[$pid][$kId] = round($norm, 4);
            }
        }

        return $normalisasiMatrix;
    }

    // Hitung PROMETHEE
    public static function hitungPROMETHEE($penginapans, $kriterias, $penilaians)
    {
        $hasil = [];
        $n = count($penginapans);

        // get normalized performance matrix (values in [0,1], cost adjusted)
        $matrixX = self::normalisasi($penilaians, $kriterias);

        // ensure normalized weights exist on criteria (fallback)
        $totalBobot = $kriterias->sum('kriteria_berat');
        foreach ($kriterias as $k) {
            if (!isset($k->bobot_normalisasi)) {
                $k->bobot_normalisasi = $totalBobot > 0 ? ($k->kriteria_berat / $totalBobot) : 0;
            }
        }

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

                    // Simple (binary) preference function for PROMETHEE Sederhana:
                    // P_j(a,b) = 1 if a better than b on criterion j, else 0.
                    // Because cost criteria were inverted during normalization, same rule applies.
                    $pAB = $nilaiA > $nilaiB ? 1 : 0;
                    $pBA = $nilaiB > $nilaiA ? 1 : 0;

                    $prefAB += $pAB * ($k->bobot_normalisasi ?? 0);
                    $prefBA += $pBA * ($k->bobot_normalisasi ?? 0);
                }

                $phiPlus += $prefAB;
                $phiMinus += $prefBA;
            }

            if ($n > 1) {
                $phiPlus  = round($phiPlus / ($n - 1), 4);
                $phiMinus = round($phiMinus / ($n - 1), 4);
                $phiNet   = round($phiPlus - $phiMinus, 4);
            } else {
                // With fewer than 2 alternatives there is no pairwise comparison
                $phiPlus = 0;
                $phiMinus = 0;
                $phiNet = 0;
            }

            $hasil[$a->id] = [
                'leaving'  => $phiPlus,
                'entering' => $phiMinus,
                'net'      => $phiNet,
            ];
        }

        return $hasil;
    }
}
