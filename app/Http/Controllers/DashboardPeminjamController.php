<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use App\Models\Ulasan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardPeminjamController extends Controller
{
    public function index()
    {
        $getAllCountPeminjaman = Peminjaman::where('user_id', auth()->user()->id)->count();
        $getAllCountUlasan = Ulasan::where('user_id', auth()->user()->id)->count();
        $getAllCountkoleksi = Koleksi::where('user_id', auth()->user()->id)->count();
        $peminjamanList = Peminjaman::with('user')->where('user_id', auth()->user()->user_id)->get();

        return view('dashboard.dashboard-peminjam', [
            'title' => 'Dashboard Peminjam',
            'active' => 'dashboard',
            'getAllCountPeminjaman' => $getAllCountPeminjaman,
            'getAllCountUlasan' => $getAllCountUlasan,
            'getAllCountkoleksi' => $getAllCountkoleksi,
            'peminjamanList' => $peminjamanList
        ]);
    }
}
