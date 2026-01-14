<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    protected $fillable = [
        'nama_penginapan',
        'alamat_penginapan',
        'jenis_penginapan',
        'kontak_penginapan',
        'harga_penginapan'
    ];

    public function images()
    {
        return $this->hasMany(PenginapanImage::class);
    }


    /**
     * Hitung nilai akhir berdasarkan matriks normalisasi
     */
    // public function referensi($matrixNormalisasi)
    // {
    //     $total = 0;

    //     $kriterias = Kriteria::all();

    //     foreach ($kriterias as $kriteria) {
    //         $nilai = $matrixNormalisasi[$this->id][$kriteria->id] ?? 0;
    //         $total += $nilai * $kriteria->kriteria_bobot;
    //     }

    //     return $total;
    // }
}
