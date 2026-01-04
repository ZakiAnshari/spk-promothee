<?php

namespace App\Http\Controllers;


use App\Models\Penilaian;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenginapanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua data penginapan
        $penginapans = Penginapan::all();
        $penilaians = Penilaian::with(['penginapan', 'subkriteria'])
            ->orderBy('created_at', 'desc') // Penilaian terbaru di atas
            ->get();

        // Kirim ke view
        return view('admin.penginapan.index', compact('penginapans', 'penilaians'));
    }


    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama_penginapan'    => 'required|string|max:255',
            'alamat_penginapan'  => 'required|string|max:255',
            'jenis_penginapan'   => 'required|string|max:100',
            'kontak_penginapan'  => 'required|string|max:50',
            'harga_penginapan'   => 'required|numeric',
            'foto_penginapan'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('foto_penginapan')) {
            $imagePath = $request->file('foto_penginapan')->store('penginapan', 'public');
        }

        // Simpan ke database
        Penginapan::create([
            'nama_penginapan'   => $validated['nama_penginapan'],
            'alamat_penginapan' => $validated['alamat_penginapan'],
            'jenis_penginapan'  => $validated['jenis_penginapan'],
            'kontak_penginapan' => $validated['kontak_penginapan'],
            'harga_penginapan'  => $validated['harga_penginapan'],
            'foto_penginapan'   => $imagePath, // pastikan field ini ada di table
        ]);

        // Respon sukses
        Alert::success('Success', 'Data Penginapan berhasil ditambahkan');
        return redirect()->route('penginapan.index');
    }

    
    public function show($id)
    {
        $penginapan = Penginapan::findOrFail($id); // ambil data sesuai id
        return view('admin.penginapan.show', compact('penginapan'));
    }
}
