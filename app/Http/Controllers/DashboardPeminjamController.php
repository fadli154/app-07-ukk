<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPeminjamController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard-peminjam', [
            'title' => 'Dashboard Peminjam',
            'active' => 'dashboard',
        ]);
    }
}
