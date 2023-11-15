<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Customer;



class SalesController extends Controller
{
    public function index() {
        $sales = Sales::where("user_id", auth()->user()->id)->paginate(6);
        return view("user.sales.index", compact('sales'));

    }

    public function create()
    {
        $customers = Customer::all();
        return view("user.sales.create", compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sales = Sales::create($request->all());
        return redirect()->route('user.sales.index')->with('success','Data penjualan berhasil dibuat!');
    }

    public function edit(Sales $sale)
    {
        $customers = Customer::all();
        return view("user.sales.edit", compact('sale','customers' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sale)
    {
        $sale->update($request->all());
        return redirect()->route('user.sales.index')->with('success','Data penjualan berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sale)
    {
        $sale->delete();
        return redirect()->route('user.sales.index')->with('success','Data penjualan berhasil dihapus!');

    }

}
