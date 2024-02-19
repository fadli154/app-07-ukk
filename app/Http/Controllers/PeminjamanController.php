<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Requests\PeminjamanRequest;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamanList = Peminjaman::with('user')->get();

        return view('dashboard.admin.peminjaman.peminjaman-index', [
            'title' => 'Peminjaman Index',
            'active1' => 'peminjaman',
            'active' => 'peminjaman',
            'peminjamanList' => $peminjamanList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userList = User::where('roles', 'peminjam')->get();
        $bukuList = Buku::get();

        return view('dashboard.admin.peminjaman.peminjaman-create', [
            'title' => 'Peminjaman Create',
            'active1' => 'peminjaman',
            'active' => 'peminjaman',
            'userList' => $userList,
            'bukuList' => $bukuList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeminjamanRequest $request)
    {
        $validateData = $request->validated();

        // mengisi field tanggal_pinjam, tanggal_kembali, status dengan sistem
        $validateData['tanggal_pinjam'] = Carbon::now()->toDateString();
        $validateData['tanggal_kembali'] = Carbon::now()->addDays(14)->toDateString();
        $validateData['tanggal_kembali_fisik'] = null;

        // mengisi field created_by, updated_by dengan sistem
        $validateData['status'] = 'dipinjam';
        $validateData['created_by'] = auth()->user()->user_id;
        $validateData['updated_by'] = auth()->user()->user_id;

        $jumlahPinjam = $validateData['jumlah_pinjam'];

        // cek jumlah pinjma tidak boleh lebih dari 3
        if ($jumlahPinjam > 3) {
            return redirect('/peminjaman')->with('error', 'Jumlah buku yang dipinjam tidak boleh lebih dari 3');
        }

        $bukuId = $validateData['buku_id'];

        // mengambil data peminjam
        $peminjam = User::find($validateData['user_id']);

        // cek apakah user active atau tidak
        if ($peminjam->status_aktif == 'Y') {
            // Cek jumlah total pinjaman buku yang sama yang sedang dipinjam oleh pengguna
            $jumlahUserMeminjam = Peminjaman::where('tanggal_kembali_fisik', null)
                ->where('user_id', $peminjam->user_id)
                ->pluck('jumlah_pinjam')
                ->sum();

            $totalMeminjam = $jumlahUserMeminjam + $jumlahPinjam;

            // Lanjutkan proses peminjaman jika jumlahnya masih di bawah atau sama dengan 3
            if ($totalMeminjam <= 3) {
                // Jika user belum meminjam 3 buku maka cek stok buku
                $buku = Buku::find($bukuId);
                if ($buku->stok_buku >= $jumlahPinjam) {
                    Peminjaman::create($validateData);
                } else {
                    return redirect('/peminjaman')->with('error', 'Stok buku tidak mencukupi.');
                }
            } else {
                return redirect('/peminjaman')->with('error', 'User sudah meminjam 3 buku.');
            }
        } else {
            return redirect('/peminjaman')->with('error', 'Status user tidak aktif.');
        }

        return redirect('/peminjaman')->with('success', 'Berhasil menambah data peminjaman!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        $peminjamanDetail = Peminjaman::where('slug', $slug)->with('user', 'buku')->get();

        $created_by_id = $peminjamanDetail[0]->created_by;
        $updated_by_id = $peminjamanDetail[0]->updated_by;

        $created_by = User::where('user_id', $created_by_id)->pluck('name');
        $updated_by = User::where('user_id', $updated_by_id)->pluck('name');

        return view('dashboard.admin.peminjaman.peminjaman-show', [
            'title' => 'Peminjaman Show',
            'active1' => 'peminjaman',
            'active' => 'peminjaman',
            'peminjamanDetail' => $peminjamanDetail[0],
            'created_by' => $created_by[0],
            'updated_by' => $updated_by[0],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $peminjamanEdit = Peminjaman::where('slug', $slug)->with('user', 'buku')->get();
        $userList = User::where('roles', 'peminjam')->get();
        $bukuList = Buku::get();

        return view('dashboard.admin.peminjaman.peminjaman-edit', [
            'title' => 'Peminjaman Edit',
            'active1' => 'peminjaman',
            'active' => 'peminjaman',
            'peminjamanEdit' => $peminjamanEdit[0],
            'userList' => $userList,
            'bukuList' => $bukuList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeminjamanRequest $request, string $slug)
    {
        $validateData = $request->validated();

        $validateData['updated_by'] = auth()->user()->user_id;

        $jumlahPinjam = $validateData['jumlah_pinjam'];

        $dataPeminjaman = Peminjaman::where('slug', $slug)->pluck('status');

        // kalau buku sudah dikembalikan tidak boleh di edit
        if ($dataPeminjaman[0] == 'dikembalikan' || $dataPeminjaman[0] == 'terlambat') {
            return redirect('/peminjaman')->with('error', 'Data yang sudah dikembalikan tidak bisa di ubah');
        }

        // cek jumlah pinjma tidak boleh lebih dari 3
        if ($jumlahPinjam > 3) {
            return redirect('/peminjaman')->with('error', 'Jumlah buku yang dipinjam tidak boleh lebih dari 3');
        }

        $bukuId = $validateData['buku_id'];

        // mengambil data peminjam
        $peminjam = User::find($validateData['user_id']);
        $buku = Buku::find($bukuId);

        // cek apakah user active atau tidak
        if ($peminjam->status_aktif == 'Y') {
            // Cek jumlah total pinjaman buku yang sama yang sedang dipinjam oleh pengguna
            $jumlahUserMeminjam = Peminjaman::where('tanggal_kembali_fisik', null)
                ->where('user_id', $peminjam->user_id)
                ->whereNot('slug', $slug)
                ->pluck('jumlah_pinjam')
                ->sum();

            $totalMeminjam =  $jumlahUserMeminjam + $jumlahPinjam;

            // Lanjutkan proses peminjaman jika jumlahnya masih di bawah atau sama dengan 3
            if ($totalMeminjam <= 3) {
                // Jika user belum meminjam 3 buku maka cek stok buku
                if ($buku->stok_buku >= $jumlahPinjam) {
                    Peminjaman::where('slug', $slug)->update($validateData);
                } else {
                    return redirect('/peminjaman')->with('error', 'Stok buku tidak mencukupi.');
                }
            } else {
                return redirect('/peminjaman')->with('error', 'User sudah meminjam 3 buku.');
            }
        } else {
            return redirect('/peminjaman')->with('error', 'Status user tidak aktif.');
        }
        return redirect('/peminjaman')->with('success', 'Berhasil mengubah data peminjaman!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $peminjam = Peminjaman::where('slug', $slug)->first();

        if ($peminjam->status == 'dipinjam') {
            Buku::where('buku_id', $peminjam->buku_id)->increment('stok_buku', $peminjam->jumlah_pinjam);
        }

        $peminjam->delete();

        return redirect('/peminjaman')->with('success', 'Berhasil menghapus data peminjaman!');
    }

    public function trash()
    {
        $trashList = Peminjaman::onlyTrashed()->get();

        return view('dashboard.admin.peminjaman.peminjaman-trash', [
            'title' => 'Peminjaman Trash',
            'active1' => 'peminjaman',
            'active' => 'peminjaman',
            'trashList' => $trashList
        ]);
    }

    public function editStatus(Request $request, string $slug)
    {
        $validateData = $request->validate([
            'status' => 'required'
        ]);

        $dataPeminjaman = Peminjaman::with('buku')->where('slug', $slug)->first();

        if ($validateData['status'] == 'dikembalikan' || $validateData['status'] == 'terlambat') {
            Buku::where('buku_id', $dataPeminjaman->buku->buku_id)->increment('stok_buku', $dataPeminjaman->jumlah_pinjam);

            $validateData['tanggal_kembali_fisik'] = Carbon::now()->toDateString();
        }

        Peminjaman::where('slug', $slug)->update($validateData);

        return redirect('/peminjaman')->with('success', 'Berhasil mengubah status peminjaman!');
    }
}