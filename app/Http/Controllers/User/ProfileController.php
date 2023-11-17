<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


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
            return redirect()->route('user.profile')->with('error', 'Password lama tidak sesuai.');
        }
        else{
            if ($request->newPass == $request->confirmPass) {
                $user->update([
                    'password' => Hash::make($request->newPass),
                ]);
                return redirect()->route('user.profile')->with('success', 'Password berhasil diubah.');
            }
            else{
                return redirect()->route('user.profile')->with('error', 'Password baru dan konfirmasi password tidak sesuai');
            }
        }
    }

    public function update(Request $request) {
        $user = User::where("id", auth()->user()->id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);
        return redirect()->route('user.profile')->with('success', 'Data Diri berhasil diubah.');
    }

}
