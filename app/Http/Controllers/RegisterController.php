<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    public function register()
    {
        return view('pages.register', [
            'title' => 'Register',
        ]);
    }

    public function registerAction(UserRequest $request)
    {
        $validateData = $request->all();

        if ($validateData) {
            if ($request->hasFile('foto_user')) {
                $image = $request->file('foto_user');
                $image->storeAs('public/foto_user/', $image->hashName());
                $validateData['foto_user'] = $image->hashName();

                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(1200, 1200, function ($constraint) {
                    $constraint->upsize();
                })->save(storage_path("app/public/foto_user/") . $validateData['foto_user']);
            }

            $validateData['roles'] = 'peminjam';

            User::create($validateData);
            return redirect()->intended('/login')->with('success', 'Berhasil login');
        }

        return redirect()->back()->with('error', 'Gagal register');
    }
}
