<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\BalanceBook;
use App\Models\Salary;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     */
    public function show(BalanceBook $balanceBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BalanceBook $balanceBook)
    {
        $salaries = Salary::whereBetween("start_date", [$balanceBook->start_date, $balanceBook->end_date])
            ->where("status", Salary::STATUS_FINANCE_APPROVED)
            ->get();
        $sales = Sales::whereBetween("sale_date", [$balanceBook->start_date, $balanceBook->end_date])
            ->get();
        return view("");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BalanceBook $balanceBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BalanceBook $balanceBook)
    {
        //
    }
}
