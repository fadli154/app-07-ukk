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
        $getAllCountPeminjaman = Peminjaman::where('user_id', auth()->user()->user_id)->count();
        $getAllCountUlasan = Ulasan::where('user_id', auth()->user()->user_id)->count();
        $getAllCountkoleksi = Koleksi::where('user_id', auth()->user()->user_id)->count();
        $peminjamanList = Peminjaman::with('user')->where('user_id', auth()->user()->user_id)->get();

        $dataBulan = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];

        $selectPeminjamanChart = Peminjaman::where('user_id', auth()->user()->user_id)->selectRaw('DATE_FORMAT(created_at, "%M") as month, COUNT(*) as count')
        ->groupBy('month')
        ->get();

        $peminajamanData = [];

        foreach ($dataBulan as $month) {
            $peminjamanData[$month] = $selectPeminjamanChart->where('month', $month)->first()->count ?? 0;
        }

        $peminjaman_count = array_values($peminjamanData);

        return view('dashboard.dashboard-peminjam', [
            'title' => 'Dashboard Peminjam',
            'active' => 'dashboard',
            'getAllCountPeminjaman' => $getAllCountPeminjaman,
            'getAllCountUlasan' => $getAllCountUlasan,
            'getAllCountkoleksi' => $getAllCountkoleksi,
            'peminjamanList' => $peminjamanList,
            'dataBulan' => $dataBulan,
            'peminjaman_count' => $peminjaman_count
        ]);
    }
}