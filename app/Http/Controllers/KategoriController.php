<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::get();
        $user = User::get();

        return view('dashboard.admin.kategori.kategori-index', [
            'title' => 'Kategori Index',
            'active' => 'kategori',
            "kategoriList" => $kategori,
            "usersList" => $user
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("admin-petugas");

        return view('dashboard.admin.kategori.kategori-create', [
            'title' => 'Kategori Index',
            'active' => 'kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("admin-petugas");

        $validateData = $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori',
        ]);

        $validateData['created_by'] = auth()->user()->user_id;
        $validateData['updated_by'] = auth()->user()->user_id;

        if ($validateData) {
            Kategori::create($validateData);

            return redirect('/kategori')->with('success', 'Berhasil menambah data kategori!');
        }

        return redirect('/kategori')->with('error', 'Gagal membuat kategori!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $created_by = User::where('user_id', $kategori->created_by)->pluck('name');
        $updated_by = User::where('user_id', $kategori->updated_by)->pluck('name');

        return view('dashboard.admin.kategori.kategori-show', [
            'title' => 'Kategori Show',
            'active' => 'kategori',
            'kategoriDetail' => $kategori,
            'created_by' => $created_by[0],
            'updated_by' => $updated_by[0],
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $this->authorize("admin-petugas");

        $kategori = Kategori::where('slug', $slug)->firstOrFail();

        return view('dashboard.admin.kategori.kategori-edit', [
            'title' => 'Kategori Edit',
            'active' => 'kategori',
            'kategoriEdit' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $this->authorize("admin-petugas");

        $validateData = $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori,' . $request->kategori_id . ',kategori_id',
        ]);

        Kategori::where('slug', $slug)->update($validateData);
        return redirect('/kategori')->with('success', 'Berhasil mengubah data kategori!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $this->authorize("admin-petugas");

        $kategori = Kategori::where('slug', $slug)->first();

        $kategori->delete();

        return redirect('/kategori')->with('success', 'Berhasil menghapus data kategori!');
    }

    public function trash()
    {
        $this->authorize("admin-petugas");

        $kategori = Kategori::onlyTrashed()->get();

        return view('dashboard.admin.kategori.kategori-trash', [
            'title' => 'Kategori Trash',
            'active' => 'kategori',
            "kategoriList" => $kategori
        ]);
    }

    public function restore(string $slug)
    {
        $this->authorize("admin-petugas");

        Kategori::onlyTrashed()->where('slug', $slug)->restore();

        return redirect('/kategori')->with('success', 'Berhasil restore data kategori!');
    }

    public function deletePermanent(string $slug)
    {
        $this->authorize("admin-petugas");

        Kategori::onlyTrashed()->where('slug', $slug)->forceDelete();

        return redirect('/kategori')->with('success', 'Berhasil menghapus permanen data kategori!');
    }
}
