<?php

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Manager\DashboardController as ManagerDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Finance\DashboardController as FinanceDashboardController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'dashboard', 'as' => 'admin.'], function() {
    Route::get('user', [UserDashboardController::class, 'dashboard']);
    Route::get('manager', [ManagerDashboardController::class, 'dashboard']);
    Route::get('admin', [AdminDashboardController::class, 'dashboard']);
    Route::get('finance', [FinanceDashboardController::class, 'dashboard']);


})->withoutMiddleware("throttle:api");
