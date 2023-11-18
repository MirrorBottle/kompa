<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\http;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $salaries = Salary::where("user_id", auth()->user()->id)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $sales = Sales::where("user_id", auth()->user()->id)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return response()->json([
            'status' => 'sucess',
            'code' => 200,
            'message' => 'Data dashboard berhasil diambil!',
            'data' => [
                'salaries' => $salaries->map(function ($salary) {
                    return [
                        'status'            => $salary->status_name_badge,
                        'date' => $salary->start_date->format("d/m/y") . " ~ " .$salary->end_date->format("d/m/y"),
                        'total'             => helperFormatCurrency($salary->base_salary + $salary->commission_amount)
                    ];
                }),
                'sales' => $sales->map(function ($sale) {
                    return [
                        'date' => $sale->sale_date->format("d/m/Y"),
                        'amount' => helperFormatCurrency($sale->sale_amount),
                        'customer' => $sale->customer->name
                    ];
                })
            ]
        ]);
    }
    public function index()
    {
        $request = Request::create('/api/dashboard/user', 'GET');
        $response = Route::dispatch($request);
        $body = json_decode($response->getContent(), true);
        $data = $body['data'];
        return view('user/dashboard', compact('data'));
    }
}
