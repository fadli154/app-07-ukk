<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
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
