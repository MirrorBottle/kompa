<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::where("company_id", auth()->user()->company_id)->paginate(10);
        return view("user.customers.index", compact('customers'));

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
        $customers = Customer::create($request->all());
        return redirect()->route('user.customers.index')->with('success','Data pelanggan berhasil dibuat!');
    }

    public function edit(Customer $customer)
    {
        return view("user.customers.edit", compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('user.customers.index')->with('success','Data pelanggan berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('user.customers.index')->with('success','Data pelanggan berhasil dihapus!');

    }

}
