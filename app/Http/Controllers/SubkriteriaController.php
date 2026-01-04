<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubkriteriaController extends Controller
{

    public function showSubPage($kriteria_id)
    {
        $kriteria = Kriteria::findOrFail($kriteria_id);
        $subkriterias = $kriteria->subkriterias;

        return view('admin.kriteria.sub', compact('kriteria', 'subkriterias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subkriteria_nama' => 'required|string',
            'subkriteria_berat' => 'required|numeric',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);
    
        Subkriteria::create($validated);
    
        Alert::success('Berhasil', 'Subkriteria berhasil ditambahkan');
        return back();
    }

    public function destroy($id)
    { 
        $subkriterias = Subkriteria::where('id',$id)->first();
        $subkriterias->delete();

        alert()->toast('Data berhasil di Hapus', 'success')->width('fit-content');
          return back();
    }
}
