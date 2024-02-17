<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.index', [
        'title' => 'Landing Page',
    ]);
});

Route::get('/login', function () {
    return view('pages.login', [
        'title' => 'Landing Page',
    ]);
});

Route::get('/login-action', function () {
    return view('dashboard.dashboard-admin', [
        'title' => 'Landing Page',
        'active' => 'dashboard',
    ]);
});

Route::get('/dashboard-admin', function () {
    return view('dashboard.dashboard-admin', [
        'title' => 'Landing Page',
        'active' => 'dashboard',
    ]);
});

Route::get('/dashboard-petugas', function () {
    return view('dashboard.dashboard-petugas', [
        'title' => 'Landing Page',
        'active' => 'dashboard',
    ]);
});

Route::get('/dashboard-peminjam', function () {
    return view('dashboard.dashboard-peminjam', [
        'title' => 'Landing Page',
        'active' => 'dashboard',
    ]);
});

// users

Route::get('/users', function () {
    return view('dashboard.admin.users.users-index', [
        'title' => 'Landing Page',
        'active' => 'users',
    ]);
});

Route::get('/users/create', function () {
    return view('dashboard.admin.users.users-create', [
        'title' => 'Landing Page',
        'active' => 'users',
    ]);
});

Route::get('/users/show', function () {
    return view('dashboard.admin.users.users-show', [
        'title' => 'Landing Page',
        'active' => 'users',
    ]);
});

Route::get('/users/edit', function () {
    return view('dashboard.admin.users.users-edit', [
        'title' => 'Landing Page',
        'active' => 'users',
    ]);
});

Route::get('/users/trash', function () {
    return view('dashboard.admin.users.users-trash', [
        'title' => 'Landing Page',
        'active' => 'users',
    ]);
});

// ketegori

Route::get('/kategori', function () {
    return view('dashboard.admin.kategori.kategori-index', [
        'title' => 'Landing Page',
        'active' => 'kategori',
    ]);
});

Route::get('/kategori/create', function () {
    return view('dashboard.admin.kategori.kategori-create', [
        'title' => 'Landing Page',
        'active' => 'kategori',
    ]);
});

Route::get('/kategori/show', function () {
    return view('dashboard.admin.kategori.kategori-show', [
        'title' => 'Landing Page',
        'active' => 'kategori',
    ]);
});

Route::get('/kategori/edit', function () {
    return view('dashboard.admin.kategori.kategori-edit', [
        'title' => 'Landing Page',
        'active' => 'kategori',
    ]);
});

Route::get('/kategori/trash', function () {
    return view('dashboard.admin.kategori.kategori-trash', [
        'title' => 'Landing Page',
        'active' => 'kategori',
    ]);
});

// buku

Route::get('/buku', function () {
    return view('dashboard.admin.buku.buku-index', [
        'title' => 'Landing Page',
        'active' => 'buku',
    ]);
});

Route::get('/buku/create', function () {
    return view('dashboard.admin.buku.buku-create', [
        'title' => 'Landing Page',
        'active' => 'buku',
    ]);
});

Route::get('/buku/show', function () {
    return view('dashboard.admin.buku.buku-show', [
        'title' => 'Landing Page',
        'active' => 'buku',
    ]);
});

Route::get('/buku/edit', function () {
    return view('dashboard.admin.buku.buku-edit', [
        'title' => 'Landing Page',
        'active' => 'buku',
    ]);
});

Route::get('/buku/trash', function () {
    return view('dashboard.admin.buku.buku-trash', [
        'title' => 'Landing Page',
        'active' => 'buku',
    ]);
});

// peminjaman

Route::get('/peminjaman', function () {
    return view('dashboard.admin.peminjaman.peminjaman-index', [
        'title' => 'Landing Page',
        'active' => 'peminjaman',
    ]);
});

Route::get('/peminjaman/create', function () {
    return view('dashboard.admin.peminjaman.peminjaman-create', [
        'title' => 'Landing Page',
        'active' => 'peminjaman',
    ]);
});

Route::get('/peminjaman/show', function () {
    return view('dashboard.admin.peminjaman.peminjaman-show', [
        'title' => 'Landing Page',
        'active' => 'peminjaman',
    ]);
});

Route::get('/peminjaman/edit', function () {
    return view('dashboard.admin.peminjaman.peminjaman-edit', [
        'title' => 'Landing Page',
        'active' => 'peminjaman',
    ]);
});

// laporan

Route::get('/laporan', function () {
    return view('dashboard.admin.laporan.laporan-index', [
        'title' => 'Landing Page',
        'active' => 'laporan',

    ]);
});

// koleksi

Route::get('/koleksi', function () {
    return view('dashboard.peminjam.koleksi.koleksi-index', [
        'title' => 'Landing Page',
        'active' => 'koleksi',

    ]);
});

// profile

Route::get('/profile', function () {
    return view('pages.profile', [
        'title' => 'Landing Page',
        'active' => 'profile',
    ]);
});

Route::get('/change-profile', function () {
    return view('pages.change-profile', [
        'title' => 'Landing Page',
        'active' => 'profile',
    ]);
});

Route::get('/change-password', function () {
    return view('pages.change-password', [
        'title' => 'Landing Page',
        'active' => 'profile',
    ]);
});
