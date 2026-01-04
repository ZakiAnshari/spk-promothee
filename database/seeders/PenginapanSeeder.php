<?php

namespace Database\Seeders;

use App\Models\Penginapan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenginapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_penginapan'   => 'Penginapan Sejuk Indah',
                'alamat_penginapan' => 'Kayu Aro Barat',
                'jenis_penginapan'  => 'Homestay',
                'kontak_penginapan' => '0821-1111-1111',
                'harga_penginapan'  => 250000,
            ],
            [
                'nama_penginapan'   => 'Hotel Gunung Kerinci',
                'alamat_penginapan' => 'Kayu Aro Tengah',
                'jenis_penginapan'  => 'Hotel',
                'kontak_penginapan' => '0821-2222-2222',
                'harga_penginapan'  => 450000,
            ],
            [
                'nama_penginapan'   => 'Homestay Sakura',
                'alamat_penginapan' => 'Kayu Aro Timur',
                'jenis_penginapan'  => 'Homestay',
                'kontak_penginapan' => '0821-3333-3333',
                'harga_penginapan'  => 200000,
            ],
            [
                'nama_penginapan'   => 'Wisma Pelangi',
                'alamat_penginapan' => 'Kayu Aro Selatan',
                'jenis_penginapan'  => 'Wisma',
                'kontak_penginapan' => '0821-4444-4444',
                'harga_penginapan'  => 300000,
            ],
            [
                'nama_penginapan'   => 'Hotel Panorama Kerinci',
                'alamat_penginapan' => 'Kayu Aro Utara',
                'jenis_penginapan'  => 'Hotel',
                'kontak_penginapan' => '0821-5555-5555',
                'harga_penginapan'  => 500000,
            ],
        ];

        foreach ($data as $item) {
            Penginapan::create($item);
        }
    }
}
