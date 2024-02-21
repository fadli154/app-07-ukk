<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index()
    {
        $this->authorize('admin-petugas');

        $laporanList = Peminjaman::with(['user', 'buku' => function ($query) {
            $query->withTrashed();
        }])->get();

        return view('dashboard.admin.laporan.laporan-index', [
            'title' => 'Laporan Index',
            'active1' => 'laporan',
            'active' => 'laporan',
            'laporanList' => $laporanList
        ]);
    }

    public function filterLaporan(Request $request)
    {
        $this->authorize('admin-petugas');

        $tanggal = $request->input('tanggal');
        $status = $request->input('status');

        if ($tanggal) {
            // Pecah rentang tanggal
            $dates = explode(' to ', $tanggal);

            // Ubah format tanggal-tanggal ke "Y-m-d"
            $from = Carbon::createFromFormat('F d, Y', trim($dates[0]))->format('Y-m-d');
            $to = Carbon::createFromFormat('F d, Y', trim($dates[1]))->format('Y-m-d');

            // Query menggunakan whereBetween
            $laporanList = Peminjaman::whereBetween('tanggal_pinjam', [$from, $to]);
        } else {
            $laporanList = Peminjaman::query();
        }

        // Tambahkan filter status jika disediakan
        if ($status) {
            $laporanList->where('status', 'like', "%$status%");
        }

        // Ambil hasil query
        $laporanList = $laporanList->get();

        return view('dashboard.admin.laporan.laporan-index', [
            'title' => 'Laporan Index',
            'active1' => 'laporan',
            'active' => 'laporan',
            'laporanList' => $laporanList
        ]);
    }

    public function exportLaporan(Request $request)
    {
        $this->authorize('admin-petugas');

        $tanggal = $request->input('tanggal');
        $status = $request->input('status');

        if ($tanggal) {
            // Pecah rentang tanggal
            $dates = explode(' to ', $tanggal);

            // Ubah format tanggal-tanggal ke "Y-m-d"
            $from = Carbon::createFromFormat('F d, Y', trim($dates[0]))->format('Y-m-d');
            $to = Carbon::createFromFormat('F d, Y', trim($dates[1]))->format('Y-m-d');

            // Query menggunakan whereBetween
            $laporanList = Peminjaman::whereBetween('tanggal_pinjam', [$from, $to]);
        } else {
            $laporanList = Peminjaman::query();
        }

        // Tambahkan filter status jika disediakan
        if ($status) {
            $laporanList->where('status', 'like', "%$status%");
        }

        // Ambil hasil query
        $laporanList = $laporanList->with('user', 'buku', 'createdBy', 'updatedBy')->get();

        // Panggil kelas eksport dan unduh file
        return Excel::download(new PeminjamanExport($laporanList), 'laporan-peminjaman.xlsx');
    }
}