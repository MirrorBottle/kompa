<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use App\Models\Sales;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $teams = Team::all();
        $salaries = Salary::orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $total_teams = [];

        foreach ($teams as $team) {
            $members = $team->users;
            $total = Sales::whereIn("user_id", $team->users->pluck('id'))
                ->whereBetween("sale_date", [Carbon::now()->startOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()])
                ->sum("sale_amount");
            $total_teams[] = [
                "name" => $team->name,
                "manager" => $team->manager->name,
                "member" => $members->plucK("name")->join(", "),
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
                'teams' => $total_teams
            ]
        ]);
    }

    public function index()
    {
        $request = Request::create('/api/dashboard/admin', 'GET');
        $response = Route::dispatch($request);
        $body = json_decode($response->getContent(), true);
        $data = $body['data'];
        $sales = Sales::paginate(6, ['*'], 'sales');
        $users = User::where("role", User::ROLE_USER)
            ->orderBy('name', 'asc')
            ->paginate(4, ['*'], 'users');

        return view("admin.dashboard", compact('sales', 'data', 'users'));
    }
}
