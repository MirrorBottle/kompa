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
        $user = User::findOrFail($user_id);
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
        $salaries = Salary::create($request->merge([
            "base_salary" => helperParseCurrency($request->base_salary)
        ])->all());
        // dd($salaries->user_id);
        $sales = Sales::where("user_id", $salaries->user_id)->where("salary_id", null)->update([
            'salary_id' => $salaries->id,
            // tambahkan field lain yang ingin diupdate
        ]);


        return redirect()->route('manager.salary.show')->with('success','Data penggajian berhasil ditambahkan!');
    }

    public function show()
    {
        $salary = Salary::where("manager_id", auth()->user()->id)->paginate(6);
        // dd($salary);
        // dd($salary->user->commission->name);

        return view("manager.salary.show", compact('salary' ));
    }

    public function edit($id)
    {
        $salary = Salary::where("id", $id)->first();
        $user = User::findOrFail($salary->user_id);
        $sales = Sales::where("salary_id", $id)->get();
        return view("manager.salary.edit", compact('salary','sales','user' ));
    }

    public function update(Request $request, $id)
    {
        $salary = Salary::where("id", $id)->first();
        $salary->update([
            "status" => $request->status,
            "commission_amount" => helperParseCurrency($request->commission_amount),
            "manager_note" => $request->manager_note,
            "end_date" => $request->end_date,
            "start_date" => $request->start_date
        ] );
        return redirect()->route('manager.salary.show')->with('success','Data penggajian berhasil diubah!');

    }



}
