<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Koleksi;
use App\Models\Peminjaman;
use App\Models\Ulasan;
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

        \App\Models\User::factory()->create(['name' => 'fatur rahman',
            'username' => 'pFaturrrr',
            'roles' => 'peminjam',
            'jk' => 'L',
            'no_telepon' => '087828303399',
            'tanggal_lahir' => '2008-12-11',
            'alamat' => 'Jalan Mana',
            'password' => Hash::make('password'),
            'email' => 'fatur@gmail.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'hasna cahya',
            'username' => 'pAmandarrr',
            'roles' => 'peminjam',
            'jk' => 'L',
            'no_telepon' => '085728303399',
            'tanggal_lahir' => '2008-12-11',
            'alamat' => 'Jalan Mana',
            'password' => Hash::make('password'),
            'email' => 'amanda@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'hasna cahya',
            'username' => 'pHasnarrr',
            'roles' => 'peminjam',
            'jk' => 'P',
            'no_telepon' => '087828303369',
            'tanggal_lahir' => '2008-12-11',
            'alamat' => 'Jalan Mana',
            'password' => Hash::make('password'),
            'email' => 'hasna@gmail.com',
        ]);

        Kategori::factory()->create([
            'nama_kategori' => 'Horor',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
        Kategori::factory()->create([
            'nama_kategori' => 'Komedi',
            'created_by' => '2',
            'updated_by' => '2',
        ]);
        Kategori::factory()->create([
            'nama_kategori' => 'Action',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
        Kategori::factory()->create([
            'nama_kategori' => 'Romance',
            'created_by' => '2',
            'updated_by' => '1',
        ]);
        Kategori::factory()->create([
            'nama_kategori' => 'Fiksi',
            'created_by' => '1',
            'updated_by' => '1',
        ]);

        Buku::factory()->create([
            'isbn' => '111-111-11-1111',
            'judul' => 'Dilan 1990',
            'penulis' => 'Pidi Baiq',
            'penerbit' => 'Gramedia',
            'tahun_terbit' => '2015',
            'stok_buku' => '20',
            'sampul_buku' => 'ada',
            'sinopsis' => 'Dilan adalah seorang siswa SMA di Bandung, sedangkan Milea adalah siswa baru, pindahan dari Jakarta. Sejak kali pertama mengetahui Milea, Dilan tertarik lalu mendekatinya. Cara Dilan untuk mendekati Milea sangatlah unik. Cara Dilan untuk mendekati Milea ini lama-lama berbalas. Meskipun Milea saat itu memiliki pacar di Jakarta bernama Beni. Awalnya Milea ragu untuk membalas perasaan pada Dilan karena dia telah memiliki Beni. Namun, kejadian saat Milea ke Jakarta membuatnya mengakhiri hubungan dengan Beni',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
        Buku::factory()->create([
            'isbn' => '111-111-11-1111',
            'judul' => 'Dilan 1990',
            'penulis' => 'Pidi Baiq',
            'penerbit' => 'Gramedia',
            'tahun_terbit' => '2015',
            'stok_buku' => '20',
            'sampul_buku' => 'ada',
            'sinopsis' => 'Dilan adalah seorang siswa SMA di Bandung, sedangkan Milea adalah siswa baru, pindahan dari Jakarta. Sejak kali pertama mengetahui Milea, Dilan tertarik lalu mendekatinya. Cara Dilan untuk mendekati Milea sangatlah unik. Cara Dilan untuk mendekati Milea ini lama-lama berbalas. Meskipun Milea saat itu memiliki pacar di Jakarta bernama Beni. Awalnya Milea ragu untuk membalas perasaan pada Dilan karena dia telah memiliki Beni. Namun, kejadian saat Milea ke Jakarta membuatnya mengakhiri hubungan dengan Beni',
            'created_by' => '1',
            'updated_by' => '1',
        ]);

        Buku::factory()->create([
            'isbn' => '111-111-11-2222',
            'judul' => 'Anchika',
            'penulis' => 'Pidi Baiq',
            'penerbit' => 'Gramedia',
            'tahun_terbit' => '2017',
            'stok_buku' => '15',
            'sampul_buku' => 'ada',
            'sinopsis' => 'Dilan adalah seorang siswa SMA di Bandung, sedangkan Milea adalah siswa baru, pindahan dari Jakarta. Sejak kali pertama mengetahui Milea, Dilan tertarik lalu mendekatinya. Cara Dilan untuk mendekati Milea sangatlah unik. Cara Dilan untuk mendekati Milea ini lama-lama berbalas. Meskipun Milea saat itu memiliki pacar di Jakarta bernama Beni. Awalnya Milea ragu untuk membalas perasaan pada Dilan karena dia telah memiliki Beni. Namun, kejadian saat Milea ke Jakarta membuatnya mengakhiri hubungan dengan Beni',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
        Buku::factory()->create([
            'isbn' => '111-111-11-3333',
            'judul' => 'Spiderman',
            'penulis' => 'Soniy',
            'penerbit' => 'Marvel',
            'tahun_terbit' => '2013',
            'stok_buku' => '10',
            'sampul_buku' => 'ada',
            'sinopsis' => 'Pertama kalinya dalam sejarah layar lebar Spider-Man, identitas asli dari pahlawan nan ramah ini terbongkar, sehingga membuat tanggung jawabnya sebagai seorang berkekuatan super berbenturan dengan kehidupan normalnya, dan menempatkan semua orang terdekatnya dalam posisi paling terancam.',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
        Buku::factory()->create([
            'isbn' => '111-111-11-4444',
            'judul' => 'Captain Amerika',
            'penulis' => 'Stephen Hawkins',
            'penerbit' => 'Marvel',
            'tahun_terbit' => '2005',
            'stok_buku' => '30',
            'sampul_buku' => 'ada',
            'sinopsis' => 'Steve Rogers berusaha untuk menempatkan dirinya di tengah dunia modern, setelah dibekukan sejak masa Perang Dunia II. Saat terbangun, kekacauan dan musuh berbahaya telah menantinya - Winter Soldier.',
            'created_by' => '1',
            'updated_by' => '1',
        ]);

        Peminjaman::factory()->create([
            'user_id' => '3',
            'buku_id' => '2',
            'tanggal_pinjam' => '2022-10-11',
            'tanggal_kembali' => '2022-10-23',
            'tanggal_kembali_fisik' => '2022-10-23',
            'jumlah_pinjam' => '2',
            'status' => 'dikembalikan',
            'created_by' => '2',
            'updated_by' => '2',
        ]);
        Peminjaman::factory()->create([
            'user_id' => '4',
            'buku_id' => '4',
            'tanggal_pinjam' => '2022-09-11',
            'tanggal_kembali' => '2022-10-01',
            'tanggal_kembali_fisik' => '2022-10-01',
            'jumlah_pinjam' => '3',
            'status' => 'dikembalikan',
            'created_by' => '2',
            'updated_by' => '2',
        ]);

        Peminjaman::factory()->create([
            'user_id' => '3',
            'buku_id' => '2',
            'tanggal_pinjam' => '2022-10-11',
            'tanggal_kembali' => '2022-10-23',
            'tanggal_kembali_fisik' => '2022-10-23',
            'jumlah_pinjam' => '2',
            'status' => 'dikembalikan',
            'created_by' => '2',
            'updated_by' => '2',
        ]);

        Peminjaman::factory()->create([
            'user_id' => '5',
            'buku_id' => '5',
            'tanggal_pinjam' => '2022-10-11',
            'tanggal_kembali' => '2022-10-23',
            'tanggal_kembali_fisik' => '2022-10-29',
            'jumlah_pinjam' => '1',
            'status' => 'terlambat',
            'created_by' => '1',
            'updated_by' => '1',
        ]);

        Ulasan::factory()->create(['user_id' => '4',
            'buku_id' => '1',
            'rating' => '5',
            'ulasan' => 'sangat bagus',
        ]);
        Ulasan::factory()->create([
            'user_id' => '2',
            'buku_id' => '2',
            'rating' => '3',
            'ulasan' => 'oke',
        ]);
        Ulasan::factory()->create([
            'user_id' => '3',
            'buku_id' => '2',
            'rating' => '3',
            'ulasan' => 'mantap',
        ]);
        Ulasan::factory()->create([
            'user_id' => '5',
            'buku_id' => '4',
            'rating' => '4',
            'ulasan' => 'Bagussssssssssss',
        ]);
        Ulasan::factory()->create([
            'user_id' => '2',
            'buku_id' => '2',
            'rating' => '5',
            'ulasan' => 'hayooooooo',
        ]);

        Koleksi::factory()->create([
            'user_id' => '3',
            'buku_id' => '3',
        ]);

        Koleksi::factory()->create([
            'user_id' => '4',
            'buku_id' => '5',
        ]);
        Koleksi::factory()->create([
            'user_id' => '4',
            'buku_id' => '3',
        ]);
        Koleksi::factory()->create([
            'user_id' => '4',
            'buku_id' => '2',
        ]);
        Koleksi::factory()->create([
            'user_id' => '4',
            'buku_id' => '1',
        ]);
    }
}