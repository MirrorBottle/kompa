<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::where("status", "!=", Salary::STATUS_DRAFT)
            ->orderBy('id', 'desc')
            ->paginate(6);
        return view("finance.salaries.index", compact('salaries'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view("finance.salaries.show", compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $salary->update([
            "status" => $request->status,
            "finance_note" => $request->finance_note
        ]);

        return redirect()->route('finance.salaries.index')->with('success','Status data penggajian berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
