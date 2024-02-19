<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Fadli hifziansyah',
            'username' => 'pdhlii',
            'roles' => 'admin',
            'jk' => 'L',
            'no_telepon' => '087827303327',
            'tanggal_lahir' => '2022-12-11',
            'alamat' => 'Jalan Maos',
            'password' => Hash::make('password'),
            'email' => 'fadli@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pasya',
            'username' => 'pdddyyy',
            'roles' => 'petugas',
            'jk' => 'L',
            'no_telepon' => '087827303329',
            'tanggal_lahir' => '2022-12-11',
            'alamat' => 'Jalan mawar',
            'password' => Hash::make('password'),
            'email' => 'pasya@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'peminjam',
            'username' => 'peminjjjaaa',
            'roles' => 'peminjam',
            'jk' => 'L',
            'no_telepon' => '087827303399',
            'tanggal_lahir' => '2022-12-11',
            'alamat' => 'Jalan mawar',
            'password' => Hash::make('password'),
            'email' => 'peminjam@gmail.com',
        ]);
    }
}