<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where("company_id", auth()->user()->company_id)
            ->paginate(6);
        return view("admin.users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->merge([
            'password' => Hash::make($request->password)
        ])->toArray());
        return redirect()->route('admin.users.index')->with('success','Data pegawai berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("admin.users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if($request->has('password')) {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
        } else {
            $request->remove('password');
        }

        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success','Data pegawai berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Data pegawai berhasil dihapus!');

    }
}
