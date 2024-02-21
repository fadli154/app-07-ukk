<?php

namespace App\Http\Controllers;

use App\Charts\StatistikPeminjaman;
use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $getAllCountPeminjam = User::where('roles', 'peminjam')->count();
        $getAllCountPetugas = User::where('roles', 'petugas')->count();
        $getAllCountBuku = Buku::count();
        $getAllCountPeminjaman = Peminjaman::count();

        $getNewstUser = User::orderBy('created_at', 'desc')->limit(4)->get();

        $ulasanList = Ulasan::limit(1)->paginate(1);

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

        $selectPeminjamanChart = Peminjaman::selectRaw('DATE_FORMAT(created_at, "%M") as month, COUNT(*) as count')
        ->groupBy('month')
        ->get();

        $peminajamanData = [];

        foreach ($dataBulan as $month) {
            $peminjamanData[$month] = $selectPeminjamanChart->where('month', $month)->first()->count ?? 0;
        }

        $peminjaman_count = array_values($peminjamanData);

        $getUserFemale = User::where('roles', 'peminjam')->where('jk', 'P')->count();
        $getUserMale = User::where('roles', 'peminjam')->where('jk', 'L')->count();

        return view('dashboard.dashboard-admin', [
            'title' => 'Dashboard Admin',
            'active' => 'dashboard',
            'peminjaman_count' => $peminjaman_count,
            'getAllCountPeminjam' => $getAllCountPeminjam,
            'getAllCountPetugas' => $getAllCountPetugas,
            'getAllCountBuku' => $getAllCountBuku,
            'getAllCountPeminjaman' => $getAllCountPeminjaman,
            'getNewstUser' => $getNewstUser,
            'ulasanList' => $ulasanList,
            'dataBulan' => $dataBulan,
            'getUserFemale' => $getUserFemale,
            'getUserMale' => $getUserMale,
        ]);
    }
}