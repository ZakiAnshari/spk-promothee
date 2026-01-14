<?php

namespace App\Http\Controllers;


use App\Models\Penilaian;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use App\Models\PenginapanImage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        // sanitize harga_penginapan: remove thousand separators so numeric validation works
        if ($request->has('harga_penginapan')) {
            $clean = preg_replace('/[^0-9]/', '', $request->input('harga_penginapan'));
            $request->merge(['harga_penginapan' => $clean]);
        }

        // 1️⃣ Validasi input
        $validated = $request->validate([
            'nama_penginapan'    => 'required|string|max:255',
            'alamat_penginapan'  => 'required|string|max:255',
            'jenis_penginapan'   => 'required|string|max:100',
            'kontak_penginapan'  => 'required|string|max:50',
            'harga_penginapan'   => 'required|numeric',

            // VALIDASI MULTIPLE IMAGE
            'images'   => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2️⃣ Simpan data penginapan (TANPA FOTO)
        $penginapan = Penginapan::create([
            'nama_penginapan'   => $validated['nama_penginapan'],
            'alamat_penginapan' => $validated['alamat_penginapan'],
            'jenis_penginapan'  => $validated['jenis_penginapan'],
            'kontak_penginapan' => $validated['kontak_penginapan'],
            'harga_penginapan'  => $validated['harga_penginapan'],
        ]);

        // 3️⃣ Simpan multiple image ke tabel penginapan_images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('penginapan', 'public');

                PenginapanImage::create([
                    'penginapan_id' => $penginapan->id,
                    'image'         => $path,
                ]);
            }
        }

        // 4️⃣ Response
        Alert::success('Success', 'Data Penginapan berhasil ditambahkan');
        return redirect()->route('penginapan.index');
    }

    public function show($id)
    {
        $penginapan = Penginapan::findOrFail($id); // ambil data sesuai id
        return view('admin.penginapan.show', compact('penginapan'));
    }

    public function edit($id)
    {
        $penginapan = Penginapan::find($id);
        if (!$penginapan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        return view('admin.penginapan.edit', compact('penginapan'));
    }

    public function update(Request $request, $id)
    {
        // 1️⃣ Ambil data penginapan
        $penginapan = Penginapan::find($id);
        if (!$penginapan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // sanitize harga_penginapan: remove thousand separators so numeric validation works
        if ($request->has('harga_penginapan')) {
            $clean = preg_replace('/[^0-9]/', '', $request->input('harga_penginapan'));
            $request->merge(['harga_penginapan' => $clean]);
        }

        // 2️⃣ Validasi input
        $validated = $request->validate([
            'nama_penginapan'    => 'required|string|max:255',
            'alamat_penginapan'  => 'required|string|max:255',
            'jenis_penginapan'   => 'required|string|max:100',
            'kontak_penginapan'  => 'required|string|max:50',
            'harga_penginapan'   => 'required|numeric',

            // VALIDASI MULTIPLE IMAGE (OPTIONAL SAAT UPDATE)
            'images'   => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 3️⃣ Update data penginapan (TANPA FOTO)
        $penginapan->update([
            'nama_penginapan'   => $validated['nama_penginapan'],
            'alamat_penginapan' => $validated['alamat_penginapan'],
            'jenis_penginapan'  => $validated['jenis_penginapan'],
            'kontak_penginapan' => $validated['kontak_penginapan'],
            'harga_penginapan'  => $validated['harga_penginapan'],
        ]);

        // 4️⃣ Jika ada image baru → simpan (TIDAK hapus image lama)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('penginapan', 'public');

                PenginapanImage::create([
                    'penginapan_id' => $penginapan->id,
                    'image'         => $path,
                ]);
            }
        }

        // 5️⃣ Response
        Alert::success('Success', 'Data Penginapan berhasil diperbarui');
        return redirect()->route('penginapan.index');
    }

    public function destroy($id)
    {
        $penginapan = Penginapan::with('images')->find($id);
        if (! $penginapan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        DB::transaction(function () use ($penginapan) {
            // Delete related penilaian rows
            Penilaian::where('penginapan_id', $penginapan->id)->delete();

            // Delete image files and their records
            foreach ($penginapan->images as $img) {
                if ($img->image && Storage::disk('public')->exists($img->image)) {
                    Storage::disk('public')->delete($img->image);
                }
                $img->delete();
            }

            // Finally delete the penginapan
            $penginapan->delete();
        });

        Alert::success('Success', 'Data berhasil di Hapus');
        return redirect()->route('penginapan.index');
    }
}
