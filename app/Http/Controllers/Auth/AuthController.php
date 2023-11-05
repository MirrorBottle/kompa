<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data, $request->has('remember'))) {
            $role = auth()->user()->role_name;
            return redirect("$role/dashboard");
        } else {
            session()->flash('error', 'Email atau Password anda salah!');
            return redirect('/login');
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $isEmailExist = User::where("email", $request->email)->first();
        if ($isEmailExist) {
            session()->flash('error', 'Email sudah terdaftar!');
            return redirect('/register');
        }
        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => User::ROLE_ADMIN,
            'phone_number' => $request->phone_number
        ]);
        $company = Company::create([
            'name'    => $request->company_name,
            'email'   => $request->email,
            'contact' => $request->phone_number,
            'address' => $request->company_address,
            'about'   => $request->company_about,
            'user_id' => $user->id
        ]);
        $user->update([
            'company_id' => $company->id
        ]);
        Auth::login($user);
        session()->flash('success', 'Akun berhasil dibuat!');
        return redirect('/dashboard');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
