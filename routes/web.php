<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboardPeminjamController;

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

route::middleware(['guest'])->group(function () {
    // Register
    Route::get('/register', [RegisterController::class, 'register'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'registerAction'])->name('register.action');

    // login
    Route::get('/login', [LoginController::class, 'login'])->name('login.index');
    Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');
});

Route::post('/logout', [LoginController::class, 'logoutAction'])->name('logout.action');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard.admin.index');
    });

    Route::middleware(['petugas'])->group(function () {
        Route::get('/dashboard-petugas', [DashboardPetugasController::class, 'index'])->name('dashboard.petugas.index');
    });

    Route::middleware(['peminjam'])->group(function () {
        Route::get('/dashboard-peminjam', [DashboardPeminjamController::class, 'index'])->name('dashboard.peminjam.index');
    });

    Route::resource('/users', UserController::class);
    Route::post('/users-nonactive/{slug}', [UserController::class, 'userNonActive'])->name('users.unactive');
    Route::post('/users-active/{slug}', [UserController::class, 'userActive'])->name('users.active');
    Route::get('/users-trash', [UserController::class, 'trash'])->name('users.trash');
    Route::get('/users-restore/{slug}', [UserController::class, 'restore'])->name('users.restore')->middleware('admin');
    Route::delete('/users-delete-permanent/{slug}', [UserController::class, 'deletePermanent'])->name('users.delete.permanent')->middleware('admin');

    Route::resource('/kategori', KategoriController::class);
    Route::get('/kategori-trash', [KategoriController::class, 'trash'])->name('kategori.trash');
    Route::get('/kategori-restore/{slug}', [KategoriController::class, 'restore'])->name('kategori.restore')->middleware('admin');
    Route::delete('/kategori-delete-permanent/{slug}', [KategoriController::class, 'deletePermanent'])->name('kategori.delete.permanent')->middleware('admin');

    Route::resource('/buku', BukuController::class);
    Route::get('/buku-trash', [BukuController::class, 'trash'])->name('buku.trash');
    Route::get('/buku-search', [BukuController::class, 'search'])->name('buku.search');
    Route::get('/buku-restore/{slug}', [BukuController::class, 'restore'])->name('buku.restore')->middleware('admin');
    Route::delete('/buku-delete-permanent/{slug}', [BukuController::class, 'deletePermanent'])->name('buku.delete.permanent')->middleware('admin');

    Route::resource('/peminjaman', PeminjamanController::class);
    Route::post('/peminjaman-edit-status/{slug}', [PeminjamanController::class, 'editStatus'])->name('peminjaman.edit.status');
    Route::get('/peminjaman-trash', [PeminjamanController::class, 'trash'])->name('peminjaman.trash');
    Route::get('/peminjaman-restore/{slug}', [PeminjamanController::class, 'restore'])->name('peminjaman.restore')->middleware('admin');
    Route::delete('/peminjaman-delete-permanent/{slug}', [PeminjamanController::class, 'deletePermanent'])->name('peminjaman.delete.permanent')->middleware('admin');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan-filter', [LaporanController::class, 'filterLaporan'])->name('laporan.filter');
    Route::post('/laporan-export', [LaporanController::class, 'exportLaporan'])->name('laporan.export');

    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
    Route::get('/koleksi-search', [KoleksiController::class, 'search'])->name('koleksi.search');
    Route::post('/koleksi', [KoleksiController::class, 'store'])->name('koleksi.store');
    Route::post('/koleksi-destroy/{slug}', [KoleksiController::class, 'destroy'])->name('koleksi.destroy');

    Route::get('/ulasan-search', [UlasanController::class, 'search'])->name('ulasan.search');
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
    Route::post('/ulasan-destroy/{slug}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile-change', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile-update/{slug}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/change-password', [ProfileController::class, 'editPassword'])->name('password.edit');
    Route::post('/password-update/{slug}', [ProfileController::class, 'updatePassword'])->name('password.update');

});
