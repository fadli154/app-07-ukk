<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardPetugasController extends Controller
{
    public function index()
    {
        $getAllCountPeminjam = User::where('roles', 'peminjam')->count();
        $getAllCountPetugas = User::where('roles', 'petugas')->count();
        $getAllCountBuku = Buku::count();
        $getAllCountPeminjaman = Peminjaman::count();

        $getNewstUser = User::orderBy('created_at', 'desc')->limit(5)->get();

        $ulasanList = Ulasan::limit(5)->paginate(6);

        $dataBulan = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];

        $getUserFemale = User::where('jk', 'P')->count();
        $getUserMale = User::where('jk', 'L')->count();

        return view('dashboard.dashboard-petugas', [
            'title' => 'Dashboard Petugas',
            'active' => 'dashboard',
            'getAllCountPeminjam' => $getAllCountPeminjam,
            'getAllCountPetugas' => $getAllCountPetugas,
            'getAllCountBuku' => $getAllCountBuku,
            'getAllCountPeminjaman' => $getAllCountPeminjaman,
            'getNewstUser' => $getNewstUser,
            'ulasanList' => $ulasanList,
            'dataBulan' => $dataBulan,
            'getUserFemale' => $getUserFemale,
            'getUserMale' => $getUserMale
        ]);
    }
}
