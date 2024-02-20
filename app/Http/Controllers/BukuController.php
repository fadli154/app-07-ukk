<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use App\Http\Requests\BukuRequest;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukuList = Buku::with('koleksi', 'ulasan')->paginate(6);

        // menghitung rata rata rating buku
        foreach ($bukuList as $buku) {
            $buku->rating = $buku->ulasan->avg('rating');
        }

        return view('dashboard.admin.buku.buku-index', [
            'title' => 'Buku Index',
            'active1' => 'buku',
            'active' => 'buku',
            'bukuList' => $bukuList,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $bukuList = Buku::where('judul', 'like', "%$search%")
                ->orWhere('penulis', 'like', "%$search%")
                ->orWhere('penerbit', 'like', "%$search%")
                ->orWhere('tahun_terbit', 'like', "%$search%")
                ->paginate(6);

            $kategoriList = Kategori::where('nama_kategori', 'like', "%$search%")->pluck('kategori_id');

            // Cari daftar buku berdasarkan kategori yang ditemukan
            if ($kategoriList->isNotEmpty()) {
                $kategoriBukuIds = KategoriBuku::whereIn('kategori_id', $kategoriList)->pluck('buku_id');

                // Gabungkan hasil pencarian kategori ke dalam $bukuList
                $bukuList = Buku::whereIn('buku_id', $kategoriBukuIds)->paginate(6);
            }
        } else {
            $bukuList = Buku::paginate(6);
        }

        // menghitung rata rata rating buku
        foreach ($bukuList as $buku) {
            $buku->rating = $buku->ulasan->avg('rating');
        }

        return view('dashboard.admin.buku.buku-index', [
            'title' => 'Buku Index',
            'active1' => 'buku',
            'active' => 'buku',
            'bukuList' => $bukuList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('admin-petugas');

        $kategoriList = Kategori::get();

        return view('dashboard.admin.buku.buku-create', [
            'title' => 'Buku Index',
            'active1' => 'buku',
            'active' => 'buku',
            'kategoriList' => $kategoriList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuRequest $request)
    {
        $this->authorize('admin-petugas');

        // mengambil data dari request yang sudah divalidasi
        $validateData = $request->validated();

        $validateData['created_by'] = auth()->user()->user_id;
        $validateData['updated_by'] = auth()->user()->user_id;

        // handle sampul buku
        if ($request->file('sampul_buku')) {
            $image = $request->file('sampul_buku');
            $image->storeAs('public/sampul_buku', $image->hashName());
            $validateData['sampul_buku'] = $image->hashName();

            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path("app/public/sampul_buku/") . $validateData['sampul_buku']);
        }

        // membuat data buku
        $buku = Buku::create($validateData);

        // membuat kategori buku
        $buku->kategori()->sync($request->kategori_id);

        return redirect('/buku')->with('success', 'Berhasil menambahkan data buku!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $bukuDetail = Buku::where('slug', $slug)->with('koleksi', 'ulasan')->first();
        $kategoriList = Kategori::get();
        $ulasanList = Ulasan::where('buku_id', $bukuDetail->buku_id)->paginate(6);

        // menghitung rata rata rating buku
        $bukuDetail->rating = $bukuDetail->ulasan->avg('rating');

        return view('dashboard.admin.buku.buku-show', [
            'title' => 'Buku Show',
            'active1' => 'buku',
            'active' => 'buku',
            'bukuDetail' => $bukuDetail,
            'kategoriList' => $kategoriList,
            'ulasanList' => $ulasanList,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $this->authorize('admin-petugas');

        $bukuEdit = buku::where('slug', $slug)->get();
        $kategoriList = Kategori::get();

        return view('dashboard.admin.buku.buku-edit', [
            'title' => 'Buku Edit',
            'active1' => 'buku',
            'active' => 'buku',
            'bukuEdit' => $bukuEdit[0],
            'kategoriList' => $kategoriList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuRequest $request, string $slug)
    {
        $this->authorize('admin-petugas');

        // mengambil data dari request
        $validateData = $request->validated();

        // Menghapus kategori beserta isinya dari array jika ada
        unset($validateData['kategori_id']);

        // handle sampul buku
        if ($request->file('sampul_buku')) {
            if ($request->old_foto) {
                // Delete the old photo
                Storage::delete('public/img_sampul_buku/' . $request->old_foto);
            }

            $image = $request->file('sampul_buku');
            $image->storeAs('public/sampul_buku', $image->hashName());
            $validateData['sampul_buku'] = $image->hashName();

            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path("app/public/sampul_buku/") . $validateData['sampul_buku']);
        }

        // membuat data buku
        $buku = Buku::where('slug', $slug)->first();
        $buku->update($validateData);

        // mengupdate/singkronisasi kategori
        if ($request->kategori_id) {
            $buku->kategori()->sync($request->kategori_id);
        }

        return redirect('/buku')->with('success', 'Berhasil mengubah data buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $this->authorize('admin-petugas');

        $buku = Buku::where('slug', $slug)->get();

        if ($buku[0]->sampul_buku) {
            // Delete the old photo
            Storage::delete('public/sampul_buku/' . $buku[0]->sampul_buku);
        }

        $buku[0]->delete();

        // mengupdate/singkronisasi kategori
        // $buku[0]->kategori()->detach();

        return redirect('/buku')->with('success', 'Berhasil menghapus data buku!');
    }

    public function trash()
    {
        $this->authorize('admin');

        $trashList = Buku::onlyTrashed()->get();

        return view('dashboard.admin.buku.buku-trash', [
            'title' => 'Buku Trash',
            'active1' => 'buku',
            'active' => 'buku',
            'trashList' => $trashList
        ]);
    }

    public function restore(string $slug)
    {
        $this->authorize('admin');

        Buku::withTrashed()->where('slug', $slug)->restore();

        return back()->with('success', "Berhasil mengembalikan data buku yang dihapus!");
    }

    public function deletePermanent(string $slug)
    {
        $this->authorize('admin');

        $buku = Buku::withTrashed()->where('slug', $slug)->get();

        if ($buku[0]->sampul_buku) {
            // Delete the old photo
            Storage::delete('public/sampul_buku/' . $buku[0]->sampul_buku);
        }

        // Perform permanent deletion
        $buku[0]->forceDelete();

        // mengupdate/singkronisasi kategori
        $buku[0]->kategori()->detach();

        return redirect('/buku')->with('success', 'Berhasil menghapus permanen data buku!');
    }
}
