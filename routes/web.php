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
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboardPeminjamController;
use App\Http\Controllers\UserController;

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
    Route::get('/users-trash', [DashboardPeminjamController::class, 'index'])->name('dashboard.peminjam.index');

});