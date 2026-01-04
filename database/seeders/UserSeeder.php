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
            ['name' => 'Operator'],
            ['name' => 'Kepala Sekolah'],
            ['name' => 'Tamu'],
        ];
        foreach ($roles as $role) {
            Roles::create($role);
        }
        // Create User
        User::create([
            'name' => 'Zaki Anshari',
            'username' => 'Zaki',
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
            'username' => 'operator',
            'contact' => '081234567890',
            'role_id' => 2, // Operator Sekolah
            'email' => 'operator@example.com',
            'jenis_kelamin' => 'Perempuan',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Budi Kepala',
            'username' => 'kepsek',
            'contact' => '089876543210',
            'role_id' => 3, // Kepala Sekolah
            'email' => 'kepsek@example.com',
            'jenis_kelamin' => 'Laki-Laki',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Dina Tamu',
            'username' => 'tamu',
            'contact' => '087712345678',
            'role_id' => 4, // Tamu
            'email' => 'tamu@example.com',
            'jenis_kelamin' => 'Perempuan',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
