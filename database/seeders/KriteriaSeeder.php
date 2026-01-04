<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;
use Database\Seeders\FasilitasSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        Kriteria::create([
            'kriteria_code'  => 'C1',
            'kriteria_nama'  => 'Harga',
            'kriteria_jenis' => 'cost',
            'kriteria_berat' => 5
        ]);

        Kriteria::create([
            'kriteria_code'  => 'C2',
            'kriteria_nama'  => 'Fasilitas',
            'kriteria_jenis' => 'benefit',
            'kriteria_berat' => 4
        ]);

        Kriteria::create([
            'kriteria_code'  => 'C3',
            'kriteria_nama'  => 'Lokasi',
            'kriteria_jenis' => 'benefit',
            'kriteria_berat' => 3
        ]);

        Kriteria::create([
            'kriteria_code'  => 'C4',
            'kriteria_nama'  => 'Kenyamanan',
            'kriteria_jenis' => 'benefit',
            'kriteria_berat' => 4
        ]);

        Kriteria::create([
            'kriteria_code'  => 'C5',
            'kriteria_nama'  => 'Jenis Penginapan',
            'kriteria_jenis' => 'benefit',
            'kriteria_berat' => 2
        ]);
    }
}
