<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'nama' => 'Nibras Bahy Ardyansyah',
            'email' => 'nibrasbahy@gmail.com',
            'nomor_hp' => '082323012220',
            'password' => Hash::make('password'), // Pastikan untuk mengenkripsi password
            'role' => 'admin',
        ];

        // Memasukkan data ke dalam database
        User::create($admin);
    }
}
