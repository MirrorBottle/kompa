<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\User;



class SalaryController extends Controller
{
    public function create($user_id)
    {
        $user = User::findOrFail( $user_id);
        $sales = Sales::where("user_id", $user_id)->get();
        return view("manager.salary.index", compact('user', 'sales'));
    }
}
