<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('roles', 'asc')->get();

        return view('dashboard.admin.users.users-index', [
            'title' => 'Users Index',
            'active' => 'users',
            "usersList" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.users.users-create', [
            'title' => 'Users Create',
            'active' => 'users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
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

            $validateData['roles'] = $request->roles;

            User::create($validateData);
            return redirect()->intended('/users')->with('success', 'Berhasil menambah data user.');
        }

        return redirect()->back()->with('error', 'Gagal menambah data user.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        return view('dashboard.admin.users.users-show', [
            'title' => 'Users Show',
            'active' => 'users',
            'usersDetail' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        return view('dashboard.admin.users.users-edit', [
            'title' => 'Users Edit',
            'active' => 'users',
            'usersEdit' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $slug)
    {
        $validateData = $request->validated();

        if (
            $validateData['status_aktif'] == 'N' &&
            $validateData['roles'] == 'admin'
        ) {
            return redirect('/users')->with('error', 'Gagal mengubah data user!');
        }

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
        return redirect('/users')->with('success', 'Berhasil mengubah data user!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $user = User::where('slug', $slug)->first();

        if ($user['foto_user']) {
            Storage::delete('public/foto_user/' . $user->foto_user);
        }

        if ($user['user_id'] == 1) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus user ini');
        }

        $user->delete();

        return redirect('/users')->with('success', 'Berhasil menghapus data user!');
    }

    public function userNonActive(string $slug)
    {
        $user = User::where('slug', $slug)->first();

        if ($user['user_id'] == 1) {
            return redirect()->back()->with('error', 'Tidak bisa non aktifkan user ini');
        }

        $user->update([
            'status_aktif' => 'N',
        ]);

        return redirect('/users')->with('success', 'Berhasil non active user!');
    }

    public function userActive(string $slug)
    {
        $user = User::where('slug', $slug)->first();

        $user->update([
            'status_aktif' => 'Y',
        ]);

        return redirect('/users')->with('success', 'Berhasil mengaktifkan user!');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->get();

        return view('dashboard.admin.users.users-trash', [
            'title' => 'Users Trash',
            'active' => 'users',
            "usersList" => $users
        ]);
    }

    public function restore(string $slug)
    {
        User::onlyTrashed()->where('slug', $slug)->restore();

        return redirect('/users')->with('success', 'Berhasil restore data user!');
    }

    public function deletePermanent(string $slug)
    {
        User::onlyTrashed()->where('slug', $slug)->forceDelete();

        return redirect('/users')->with('success', 'Berhasil menghapus permanen data user!');
    }

}