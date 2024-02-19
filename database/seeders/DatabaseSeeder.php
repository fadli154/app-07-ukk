<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\Kategori;
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

        Kategori::factory()->create([
            'nama_kategori' => 'Horor',
            'created_by' => '1',
            'updated_by' => '1',
        ]);

        Buku::factory()->create([
            'isbn' => '111-111-11-1111',
            'judul' => 'Dilan 1990',
            'penulis' => 'Pidi Baiq',
            'penerbit' => 'Gramedia',
            'tahun_terbit' => '2015',
            'stok_buku' => '15 ',
            'sampul_buku' => 'ada',
            'sinopsis' => 'Dilan adalah seorang siswa SMA di Bandung, sedangkan Milea adalah siswa baru, pindahan dari Jakarta. Sejak kali pertama mengetahui Milea, Dilan tertarik lalu mendekatinya. Cara Dilan untuk mendekati Milea sangatlah unik. Cara Dilan untuk mendekati Milea ini lama-lama berbalas. Meskipun Milea saat itu memiliki pacar di Jakarta bernama Beni. Awalnya Milea ragu untuk membalas perasaan pada Dilan karena dia telah memiliki Beni. Namun, kejadian saat Milea ke Jakarta membuatnya mengakhiri hubungan dengan Beni',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
    }
}