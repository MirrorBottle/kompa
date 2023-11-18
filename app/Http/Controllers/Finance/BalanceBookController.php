<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\BalanceBook;
use App\Models\BalanceBookItem;
use App\Models\Salary;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalanceBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = BalanceBook::orderBy('created_at', 'desc')
            ->paginate(6);

        return view("finance.balance-books.index", compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("finance.balance-books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = "PEMBUKUAN " . Carbon::parse($request->start_date)->format("d/m") . " ~ " . Carbon::parse($request->end_date)->format("d/m");
        $book = BalanceBook::create([
            "company_id" => $request->company_id,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "name" => $name,
        ]);
        return redirect()->route('finance.balance-books.edit', $book->id)->with('success','Data pembukuan berhasil dibuat!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = BalanceBook::findOrFail($id);
        $salaries = Salary::whereBetween("start_date", [$book->start_date, $book->end_date])
            ->where("status", Salary::STATUS_FINANCE_APPROVED)
            ->get();
        $sales = Sales::whereBetween("sale_date", [$book->start_date, $book->end_date])
            ->get();

        $sales_total = $sales->sum("sale_amount");
        $salary_total = $salaries->sum(function($t){
            return $t->base_salary + $t->commission_amount;
        });
        $expanse_total = $book->items->whereIn("type", [4])->sum("amount");
        return view("finance.balance-books.edit", compact("salaries", "sales", "book", "sales_total", "salary_total", "expanse_total"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = BalanceBook::findOrFail($id);
        $request->merge([
            'finalized_date' => date('Y-m-d')
        ]);
        $book->update($request->except([
            '_method', '_token'
        ]));
        return redirect()->route('finance.balance-books.index')->with('success','Data pembukuan berhasil dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = BalanceBook::findOrFail($id);
        $book->delete();
        return redirect()->route('finance.balance-books.index')->with('success','Data pembukuan berhasil dihapus!');

    }
}
