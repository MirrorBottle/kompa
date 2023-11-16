<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    public function index() {
        $user = User::where("id", auth()->user()->id);
        $profilee = true;
        return view("user.profile.index", compact('user', 'profilee'));
    }

    public function changePass(Request $request) {
        $user = auth()->user();

        // Verifikasi password lama
        if (!Hash::check($request->oldPass, $user->password)) {
            return back()->with('error', 'Password lama tidak sesuai.');
        }

        // Verifikasi password lama
        if ($request->newPass == $request->confirmPass) {
            return back()->with('error', 'Password baru dan konfirmasi password tidak sesuai');
        }

        // Update password baru
        $user->update([
            'password' => Hash::make($request->newPass),
        ]);

        return view("user.profile.index")->with('success', 'Password berhasil diubah.');
    }

    public function update(Request $request) {

    }

}
