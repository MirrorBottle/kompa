<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salary;


class SalaryController extends Controller
{
    public function index() {
        $salary = Salary::where("user_id", auth()->user()->id)->where("status", 4)->paginate(6);
        return view("user.salary.index", compact('salary'));
    }
}
