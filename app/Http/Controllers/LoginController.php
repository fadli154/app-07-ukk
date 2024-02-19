<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('pages.login', [
            'title' => 'Login',
        ]);
    }

    public function loginAction(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($validateData)) {
            $request->session()->regenerate();

            if (auth()->user()->roles == 'admin') {
                return redirect()->intended('dashboard-admin')->with('success', 'Berhasil login!');
            } else if (auth()->user()->roles == 'petugas') {
                return redirect()->intended('dashboard-petugas')->with('success', 'Berhasil login!');
            } else if (auth()->user()->roles == 'peminjam') {
                return redirect()->intended('dashboard-peminjam')->with('success', 'Berhasil login!');
            }
        }

        return redirect()->back()->with('error', 'Gagal login');
    }

    public function logoutAction(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->intended('login')->with('success', 'Berhasil logout!');
    }
}
