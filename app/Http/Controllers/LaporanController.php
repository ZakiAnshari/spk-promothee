<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penginapan;
use App\Models\Penilaian;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with(['subkriteria.kriteria', 'penginapan'])->get();

        // Ambil hanya penginapan yang ada di penilaian
        $penginapanIds = $penilaians->pluck('penginapan_id')->unique();
        $fasilitas = Penginapan::whereIn('id', $penginapanIds)->get();

        $kriterias = Kriteria::all();

        $matrixNormalisasi = Perhitungan::normalisasi($penilaians, $kriterias);

        // Hitung nilai akhir (menggunakan PROMETHEE sederhana dari Perhitungan)
        $hasilPROMETHEE = Perhitungan::hitungPROMETHEE($fasilitas, $kriterias, $penilaians);

        foreach ($fasilitas as $item) {
            $item->phi_plus  = $hasilPROMETHEE[$item->id]['leaving'] ?? 0;
            $item->phi_minus = $hasilPROMETHEE[$item->id]['entering'] ?? 0;
            $item->phi       = $hasilPROMETHEE[$item->id]['net'] ?? 0;
        }

        // Urutkan berdasarkan Net Flow & beri ranking
        $fasilitas = $fasilitas->sortByDesc('phi')->values();
        $rank = 1;
        foreach ($fasilitas as $item) {
            $item->ranking = $rank++;
        }

        return view('admin.laporan.index', compact('fasilitas', 'kriterias', 'penilaians', 'matrixNormalisasi'));
    }
}
