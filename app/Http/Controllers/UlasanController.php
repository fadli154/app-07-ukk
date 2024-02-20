<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'buku_id' => 'required',
            'ulasan' => 'nullable|max:200',
            'rating' => 'required',
            'foto_ulasan' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $validateData['user_id'] = auth()->user()->user_id;

        if ($validateData) {
            if ($request->hasFile('foto_ulasan')) {
                $image = $request->file('foto_ulasan');
                $image->storeAs('public/foto_ulasan/', $image->hashName());
                $validateData['foto_ulasan'] = $image->hashName();

                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(1200, 1200, function ($constraint) {
                    $constraint->upsize();
                })->save(storage_path("app/public/foto_ulasan/") . $validateData['foto_ulasan']);
            }

            Ulasan::create($validateData);

            $bukuDetail = Buku::where('buku_id', $validateData['buku_id'])->first();

            return redirect()->route('buku.show', $bukuDetail->slug)->with('success', 'Berhasil menambah data ulasan!');
        }

        return redirect()->route('buku.show')->with('error', 'Gagal membuat ulasan!');
    }

    public function update(Request $request, string $slug)
    {
        $validateData = $request->validate([
            'buku_id' => 'required',
            'ulasan' => 'nullable|max:200',
            'rating' => 'required',
            'foto_ulasan' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $validateData['user_id'] = auth()->user()->user_id;

        $bukuDetail = Buku::where('buku_id', $validateData['buku_id'])->first();

        if ($validateData) {
            if ($request->hasFile('foto_ulasan')) {
                if ($request->old_foto) {
                    // Delete the old photo
                    Storage::delete('public/foto_ulasan/' . $request->old_foto);
                }

                $image = $request->file('foto_ulasan');
                $image->storeAs('public/foto_ulasan/', $image->hashName());
                $validateData['foto_ulasan'] = $image->hashName();

                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(1200, 1200, function ($constraint) {
                    $constraint->upsize();
                })->save(storage_path("app/public/foto_ulasan/") . $validateData['foto_ulasan']);
            }

            Ulasan::where('slug', $slug)->update($validateData);



            return redirect()->route('buku.show', $bukuDetail->slug)->with('success', 'Berhasil mengubah data ulasan!');
        }

        return redirect()->route('buku.show', $bukuDetail->slug)->with('error', 'Gagal membuat ulasan!');
    }

    public function destroy(string $slug)
    {
        $ulasan = Ulasan::where('slug', $slug)->first();

        $bukuDetail = Buku::where('slug', $slug)->first();

        $ulasan->delete();

        return redirect()->route('buku.show', $bukuDetail->slug)->with('success', 'Berhasil menghapus data ulasan!');
    }
}