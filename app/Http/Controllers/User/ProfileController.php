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

    public function update(Request $request) {

    }
}
