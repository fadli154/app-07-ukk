<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
}