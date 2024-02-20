<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksiList = Koleksi::where('user_id', auth()->user()->user_id)->with('buku', 'user')->paginate(6);

        return view('dashboard.peminjam.koleksi.koleksi-index', [
            'title' => 'Koleksi Index',
            'active' => 'koleksi',
            'koleksiList' => $koleksiList
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $koleksiList = Koleksi::with('buku', 'user')->whereHas('buku', function ($query) use ($search) {
                $query->where('judul', 'like', "%$search%")
                ->orWhere('penulis', 'like', "%$search%")
                ->orWhere('penerbit', 'like', "%$search%")
                ->orWhere('tahun_terbit', 'like', "%$search%");
            })->where('user_id', auth()->user()->user_id)->paginate(6);
        } else {
            $koleksiList = Koleksi::wit('buku', 'user')->where('user_id', auth()->user()->user_id)->paginate(6);
        }

        $kategoriList = Kategori::where('nama_kategori', 'like', "%$search%")->pluck('kategori_id');

        // Cari daftar buku berdasarkan kategori yang ditemukan
        if ($kategoriList->isNotEmpty()) {
            $kategoriBukuIds = KategoriBuku::whereIn('kategori_id', $kategoriList)->pluck('buku_id');

            // Gabungkan hasil pencarian kategori ke dalam $koleksiList
            $koleksiList = Koleksi::with('buku', 'user')->where('user_id', auth()->user()->user_id)->whereIn('buku_id', $kategoriBukuIds)->paginate(6);
        }

        return view('dashboard.peminjam.koleksi.koleksi-index', [
            'title' => 'Buku Index',
            'active1' => 'buku',
            'active' => 'buku',
            'koleksiList' => $koleksiList
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'buku_id' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->user_id;

        Koleksi::create($validateData);
        return redirect('/koleksi')->with('success', 'Berhasil menambah data koleksi!');
    }

    public function destroy(string $slug)
    {
        $koleksi = Koleksi::where('slug', $slug)->first();
        $koleksi->delete();

        return redirect('/koleksi')->with('success', 'Berhasil menghapus data koleksi!');
    }
}