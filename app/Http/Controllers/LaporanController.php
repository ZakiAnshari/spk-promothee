<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Fasilitas;
use App\Models\Penilaian;
use App\Models\Perhitungan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with(['subkriteria.kriteria', 'fasilitas'])->get();

        // Ambil hanya fasilitas yang ada di penilaian
        $fasilitasIds = $penilaians->pluck('fasilitas_id')->unique();
        $fasilitas = Fasilitas::whereIn('id', $fasilitasIds)->get();

        $kriterias = Kriteria::all();

        $matrixNormalisasi = Perhitungan::normalisasi($penilaians, $kriterias);

        // Tambahkan nilai akhir ke tiap fasilitas
        foreach ($fasilitas as $item) {
            $item->nilai_akhir = $item->referensi($matrixNormalisasi);
        }

        return view('admin.laporan.index', compact('fasilitas', 'kriterias', 'penilaians', 'matrixNormalisasi'));
    }
}
