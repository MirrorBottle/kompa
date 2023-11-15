<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CommissionRate;
use App\Models\User;
use App\Models\UserCommissionRate;

class UserCommissionRateController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $rates = UserCommissionRate::where("user_id", $user_id)->orderBy('is_invalid')->paginate(6);
        $user = User::findOrFail($user_id);
        return view("manager.user-commission-rates.index", compact('rates', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user_id)
    {
        $user = User::findOrFail($user_id);
        $rates = CommissionRate::get();
        return view("manager.user-commission-rates.create", compact('user', 'rates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        UserCommissionRate::where('user_id', $request->user_id)
            ->where('is_invalid', 0)
            ->update([
                'is_invalid' => 1,
                'invalid_date' => date('Y-m-d')
            ]);
        $rate = UserCommissionRate::create($request->toArray());
        // * UPDATE OTHER RATE TO INVALID
        return redirect()->route('manager.user-commission-rates.index', $request->user_id)->with('success','Data rencana komisi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commission = CommissionRate::findOrFail($id);
        $commission->delete();
        return redirect()->route('manager.user-commission-rates.index')->with('success','Data persentase komisi berhasil dihapus!');

    }
}
