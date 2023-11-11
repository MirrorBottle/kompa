<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function index() {
        $custumors = Customer::where("company_id", auth()->user()->company_id)->paginate(10);
        return view("user.customers.index", compact('custumors'));

    }

    public function create()
    {
        return view("user.customers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $custumors = Customer::create($request->all());
        return redirect()->route('customers.index')->with('success','Data departemen berhasil dibuat!');
    }

    public function edit(Customer $custumor)
    {
        return view("user.customers.edit", compact('custumor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $custumor)
    {
        $custumor->update($request->all());
        return redirect()->route('custumors.index')->with('success','Data departemen berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $custumor)
    {
        $custumor->delete();
        return redirect()->route('custumors.index')->with('success','Data departemen berhasil dihapus!');

    }

}
