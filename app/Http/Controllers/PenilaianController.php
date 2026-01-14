<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Penginapan;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {
        $penginapans = Penginapan::orderBy('created_at', 'desc')->get(); 
        $kriterias = Kriteria::with('subkriterias')->get();
        $subkriterias = Subkriteria::all();
        $penilaians = Penilaian::with(['penginapan', 'subkriteria'])
            ->orderBy('created_at', 'desc') // Penilaian terbaru di atas
            ->get();

        return view('admin.penilaian.index', compact('kriterias', 'subkriterias', 'penginapans', 'penilaians'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'penginapan_id' => 'required|exists:penginapans,id',
            'subkriteria_id' => 'required|array',
            'subkriteria_id.*' => 'required|exists:subkriterias,id',
        ]);

        // Cek apakah penilaian untuk fasilitas ini sudah ada
        $sudahDinilai = Penilaian::where('penginapan_id', $request->penginapan_id)->exists();

        if ($sudahDinilai) {
            return redirect()->back()->withErrors(['penginapan_id' => 'Penilaian untuk Penginapan ini sudah ada.']);
        }

        foreach ($request->subkriteria_id as $kriteria_id => $subkriteria_id) {
            $sub = \App\Models\Subkriteria::find($subkriteria_id);

            Penilaian::create([
                'penginapan_id'     => $request->penginapan_id,
                'kriteria_id'      => $kriteria_id,
                'subkriteria_id'   => $subkriteria_id,
                'nilai'            => $sub->subkriteria_berat ?? null,
            ]);
        }
        Alert::success('Berhasil', 'Penginapan berhasil ditambahkan');
        return back();
    }

    public function destroy($fasilitas_id)
    {
        $exists = Penilaian::where('penginapan_id', $fasilitas_id)->exists();
        if (! $exists) {
            return redirect()->back()->with('error', 'Penilaian tidak ditemukan');
        }

        DB::transaction(function () use ($fasilitas_id) {
            Penilaian::where('penginapan_id', $fasilitas_id)->delete();
        });

        alert()->toast('Penilaian berhasil dihapus', 'success')->width('fit-content');
        return redirect()->route('penilaian.index');
    }
}
