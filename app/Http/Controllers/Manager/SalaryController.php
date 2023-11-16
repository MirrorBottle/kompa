<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\User;
use App\Models\Salary;




class SalaryController extends Controller
{
    public function create($user_id, Request $request)
    {
        $user = User::findOrFail( $user_id);
        $sales = Sales::where("user_id", $user_id)->where("salary_id", null)->get();
        $komisi = 0;
        foreach ($sales as $sale) {
            $komisi = $komisi + $sale->sale_amount;
        }
        $totalKomisi = ($komisi * $user->commission->percentage)/100;

        return view("manager.salary.index", compact('user', 'sales','totalKomisi' ));
    }

    public function store(Request $request)
    {
        $salaries = Salary::create($request->all());
        // dd($salaries->user_id);

        $sales = Sales::where("user_id", $salaries->user_id)->where("salary_id", null)->update([
            'salary_id' => $salaries->id,
            // tambahkan field lain yang ingin diupdate
        ]);


        return redirect()->route('manager.team.index');
    }





}
