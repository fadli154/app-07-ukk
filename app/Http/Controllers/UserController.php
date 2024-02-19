<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function update(Request $request, string $id)
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
