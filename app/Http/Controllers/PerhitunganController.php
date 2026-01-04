<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Fasilitas;
use App\Models\Penilaian;
use App\Models\Penginapan;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        // Ambil semua penilaian beserta subkriteria dan penginapan
        $penilaians = Penilaian::with(['subkriteria.kriteria', 'penginapan'])->get();

        // Ambil penginapan yang punya penilaian
        $penginapanIds = $penilaians->pluck('penginapan_id')->unique();
        $penginapans = Penginapan::whereIn('id', $penginapanIds)->get();

        // Ambil semua kriteria
        $kriterias = Kriteria::all();

        // --- NORMALISASI BOBOT --- //
        $totalBobot = $kriterias->sum('kriteria_berat'); // jumlah nilai 1-5
        foreach ($kriterias as $k) {
            $k->bobot_normalisasi = round($k->kriteria_berat / $totalBobot, 2); // misal 0.28, 0.22
        }

        // Hitung PROMETHEE dengan bobot normalisasi
        $hasilPROMETHEE = Perhitungan::hitungPROMETHEE($penginapans, $kriterias, $penilaians);

        // Sisipkan hasil ke objek penginapan
        foreach ($penginapans as $item) {
            $item->phi_plus  = $hasilPROMETHEE[$item->id]['leaving'] ?? 0;
            $item->phi_minus = $hasilPROMETHEE[$item->id]['entering'] ?? 0;
            $item->phi       = $hasilPROMETHEE[$item->id]['net'] ?? 0;
        }

        // Urutkan berdasarkan Net Flow & beri ranking
        $penginapans = $penginapans->sortByDesc('phi')->values();
        $rank = 1;
        foreach ($penginapans as $item) {
            $item->ranking = $rank++;
        }

        return view('admin.perhitungan.index', compact('penginapans', 'kriterias', 'penilaians'));
    }






    public function cetakperhitungan()
    {
        $penilaians = Penilaian::with(['subkriteria.kriteria', 'penginapan'])->get();

        $penginapanIds = $penilaians->pluck('penginapan_id')->unique();
        $penginapans = Penginapan::whereIn('id', $penginapanIds)->get();

        $kriterias = Kriteria::all();

        $matrixNormalisasi = Perhitungan::normalisasi($penilaians, $kriterias);

        foreach ($penginapans as $item) {
            $item->nilai_akhir = $item->referensi($matrixNormalisasi);
        }

        return view(
            'admin.perhitungan.cetak',
            compact('penginapans', 'kriterias', 'penilaians', 'matrixNormalisasi')
        );
    }
}
