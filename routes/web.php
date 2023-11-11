<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\User\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WebController::class, 'index']);



Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginView');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'registerView');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});


Route::middleware('auth')->group(function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });

    Route::group(['namespace' => 'Master', 'prefix' => 'master', 'as' => 'master.', 'middleware' => 'role:master'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });

    Route::group(['namespace' => 'Finance', 'prefix' => 'finance', 'as' => 'finance.', 'middleware' => 'role:finance'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });

    Route::group(['namespace' => 'Manager', 'prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'role:manager'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource("customers", CustomerController::class);
    });

    Route::group(['prefix' => 'company', 'as' => 'company.'], function() {
        Route::resource("users", UserController::class);
        Route::resource("teams", UserController::class);
        Route::get("detail", [CompanyController::class, 'detail'])->name("detail");
        Route::put("update", [CompanyController::class, 'update'])->name("update");
    });
});
