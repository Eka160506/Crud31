<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ARoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat user biasa
        User::create([
            'name' => 'User', // Nama user
            'email' => 'user@example.com', // Email user
            'password' => bcrypt('12345678'), // Kata sandi user
            'role' => 'user', // Peran user
        ]);

        // Membuat petugas
        User::create([
            'name' => 'Petugas', // Nama petugas
            'email' => 'petugas@example.com', // Email petugas
            'password' => bcrypt('12345678'), // Kata sandi petugas
            'role' => 'petugas', // Peran petugas
        ]);

        // Membuat admin
        User::create([
            'name' => 'Admin', // Nama admin
            'email' => 'admin@example.com', // Email admin
            'password' => bcrypt('12345678'), // Kata sandi admin
            'role' => 'admin', // Peran admin
        ]);
    }
}

?>
