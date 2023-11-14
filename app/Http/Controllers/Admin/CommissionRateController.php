<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CommissionRate;
class CommissionRateController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commissions = CommissionRate::where("company_id", auth()->user()->company_id)
            ->paginate(6);
        return view("admin.commission-rates.index", compact('commissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.commission-rates.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $commission = CommissionRate::create($request->toArray());
        return redirect()->route('admin.commission-rates.index')->with('success','Data persentase komisi berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CommissionRate $commission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $commission = CommissionRate::findOrFail($id);
        return view("admin.commission-rates.edit", compact('commission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommissionRate $commission)
    {

        $commission->update($request->all());
        return redirect()->route('admin.commission-rates.index')->with('success','Data persentase komisi berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commission = CommissionRate::findOrFail($id);
        $commission->delete();
        return redirect()->route('admin.commission-rates.index')->with('success','Data persentase komisi berhasil dihapus!');

    }
}
