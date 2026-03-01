<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // perform same PROMETHEE calculation as in PerhitunganController so that
        // the layout can render phi values and ranking for the page header table.
        $penilaians = \App\Models\Penilaian::with(['subkriteria.kriteria', 'penginapan'])->get();

        // only consider penginapan that have at least one penilaian
        $penginapanIds = $penilaians->pluck('penginapan_id')->unique();
        $penginapans = Penginapan::whereIn('id', $penginapanIds)->get();

        $kriterias = \App\Models\Kriteria::all();

        // normalisasi bobot
        $totalBobot = $kriterias->sum('kriteria_berat');
        foreach ($kriterias as $k) {
            $k->bobot_normalisasi = round($k->kriteria_berat / $totalBobot, 2);
        }

        $hasilPROMETHEE = \App\Models\Perhitungan::hitungPROMETHEE($penginapans, $kriterias, $penilaians);
        foreach ($penginapans as $item) {
            $item->phi_plus  = $hasilPROMETHEE[$item->id]['leaving'] ?? 0;
            $item->phi_minus = $hasilPROMETHEE[$item->id]['entering'] ?? 0;
            $item->phi       = $hasilPROMETHEE[$item->id]['net'] ?? 0;
        }

        // sort and assign ranking
        $penginapans = $penginapans->sortByDesc('phi')->values();
        $rank = 1;
        foreach ($penginapans as $item) {
            $item->ranking = $rank++;
        }

        return view('home', compact('penginapans'));
    }
}
