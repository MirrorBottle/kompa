<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function detail()
    {
        $company = auth()->user()->company;
        return view("company.show", compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $company = Company::find(auth()->user()->company_id);
        $company->update($request->all());
        return redirect()->route('company.detail')->with('success','Info perusahaan berhasil diubah!');
    }
}
