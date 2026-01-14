<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        $kriterias = Kriteria::all();
        $kriteria_nama = $request->input('kriteria_nama');
        $paginate = $request->input('itemsPerPage', 5);
        $query = Kriteria::query();
        // Jika ada pencarian nama
        if (!empty($kriteria_nama)) {
            $query->where('kriteria_nama', 'LIKE', '%' . $kriteria_nama	 . '%');
        }
        // Eksekusi query dengan paginasi
        $kriterias = $query->paginate($paginate);
        // Kirim ke view
        return view('admin.kriteria.index', compact('kriterias','kriteria_nama'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kriteria_code'  => 'required|string|max:255',
            'kriteria_nama'  => 'required|string|max:255|unique:kriterias,kriteria_nama',
            'kriteria_jenis' => 'required',
            'kriteria_berat' => 'required',
        ]);

        Kriteria::create($validated);

        Alert::success('Success', 'Data Kriteria berhasil ditambahkan');
        return back();
    }

    public function edit($id)
    {
        $kriterias = Kriteria::find($id);
        if (!$kriterias) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        return view('admin.kriteria.edit', compact('kriterias'));
    }

    public function update(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $kriterias = Kriteria::findOrFail($id);

        // Validasi data yang masuk
        $validatedData = $request->validate([
            'kriteria_code'  => 'required|string|max:255',
            'kriteria_nama'  => 'required|string|max:255',
            'kriteria_jenis' => 'required',
            'kriteria_berat' => 'required',
        ]);

        // Perbarui data di database
        $kriterias->update($validatedData);

        // Redirect kembali dengan pesan sukses
        alert()->toast('Data berhasil diperbarui', 'success')->width('fit-content');
        return redirect()->route('kriteria.index');
    }

    public function destroy($id)
    { 
        $kriterias = Kriteria::with('subkriterias')->find($id);
        if (! $kriterias) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        DB::transaction(function () use ($kriterias) {
            // Delete penilaian related to this kriteria
            Penilaian::where('kriteria_id', $kriterias->id)->delete();

            // Delete subkriterias for this kriteria
            foreach ($kriterias->subkriterias as $sub) {
                $sub->delete();
            }

            // Finally delete the kriteria
            $kriterias->delete();
        });

        alert()->toast('Data berhasil di Hapus', 'success')->width('fit-content');
        return redirect()->route('kriteria.index');
    }
    
  
}
