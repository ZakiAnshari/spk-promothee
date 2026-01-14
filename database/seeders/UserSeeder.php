<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Pengelola']
        ];
        foreach ($roles as $role) {
            Roles::create($role);
        }
        // Create User
        User::create([
            'name' => 'Muhammad Nurul Hidayat',
            'username' => 'Dayat',
            'contact' => '082387444002',
            'role_id' => 1,
            'email' => 'admin@example.com',
            'jenis_kelamin' => 'Laki-Laki',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Ganti dengan password yang aman
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Rina Operator',
            'username' => 'Pengelola',
            'contact' => '081234567890',
            'role_id' => 2, // Operator Sekolah
            'email' => 'pengelola@example.com',
            'jenis_kelamin' => 'Perempuan',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

    }
}
