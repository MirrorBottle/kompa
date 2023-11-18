<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $members = auth()->user()->team->users;
        $salaries = Salary::where("manager_id", auth()->user()->id)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $total_sales = [];

        foreach ($members as $member) {
            $total = Sales::where("user_id", $member->id)
                ->whereBetween("sale_date", [Carbon::now()->startOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()])
                ->sum("sale_amount");
            $total_sales[] = [
                "name" => $member->name,
                "commission" => $member->commission ? $member->commission->name : 'Tidak Ada',
                "total" => helperFormatCurrency($total)
            ];
        }

        return response()->json([
            'status' => 'sucess',
            'code' => 200,
            'message' => 'Data dashboard berhasil diambil!',
            'data' => [
                'salaries' => $salaries->map(function ($salary) {
                    return [
                        'status' => $salary->status_name_badge,
                        'name'   => $salary->user->name,
                        'total'  => helperFormatCurrency($salary->base_salary + $salary->commission_amount)
                    ];
                }),
                'members' => $total_sales
            ]
        ]);
    }
    public function index()
    {
        $request = Request::create('/api/dashboard/manager', 'GET');
        $response = Route::dispatch($request);
        $body = json_decode($response->getContent(), true);
        $data = $body['data'];
        $members = auth()->user()->team->users;
        $sales = Sales::whereIn('user_id', $members->pluck('id'))
            ->paginate(6);

        return view("manager.dashboard", compact('sales', 'data'));
    }
}
