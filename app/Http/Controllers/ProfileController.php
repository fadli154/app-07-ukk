<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function index()
    {
        $user = User::where('slug', auth()->user()->slug)->firstOrFail();
        $peminjamanList = Peminjaman::where('user_id', $user->user_id)->get();

        return view('pages.profile', [
            'title' => 'Profile Index',
            'active' => 'profile',
            'profileDetail' => $user,
            'peminjamanList' => $peminjamanList,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit()
    {
        $user = User::where('slug', auth()->user()->slug)->firstOrFail();

        return view('pages.change-profile', [
            'title' => 'Profile Edit',
            'active' => 'profile',
            'profileEdit' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $validateData = $request->validate([
            'name' => 'nullable|max:80',
            'username' => 'nullable|max:50',
            'foto_user' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        if ($request->file('foto_user')) {
            if ($request->old_foto) {
                // Delete the old photo
                Storage::delete('public/foto_user/' . $request->old_foto);
            }

            $image = $request->file('foto_user');
            $image->storeAs('public/foto_user/', $image->hashName());
            $validateData['foto_user'] = $image->hashName();

            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1200, 1200, function ($constraint) {
                $constraint->upsize();
            })->save(storage_path("app/public/foto_user/") . $validateData['foto_user']);
        }

        User::where('slug', $slug)->update($validateData);
        return redirect('/profile')->with('success', 'Berhasil mengubah data profile!');
    }

    public function editPassword()
    {
        $user = User::where('slug', auth()->user()->slug)->firstOrFail();

        return view('pages.change-password', [
            'title' => 'Password Edit',
            'active' => 'change-password',
            'passwordEdit' => $user,
        ]);
    }
}