<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

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
    });

    Route::group(['namespace' => 'User', 'prefix' => 'user', 'as' => 'user.', 'middleware' => 'role:user'], function () {
        Route::get('/dashboard', 'DashboardController@index'
        )->name('dashboard');

        Route::get('/dashboard/sales', function(){
            return view ('user.sales.index');
        })->name('user');

        Route::controller(CustomerController::class)->group(function(){
            Route::get('/dashboard/customers', 'index')->name('customers.index');
            Route::get('/dashboard/customers/tambah', 'create')->name('customers.create');
            // Route::post('/staff/mahasiswa/tambah/action','store')->name('staff.store');
            // Route::get('/staff/mahasiswa/edit/{id}', 'edit')->name('staff.edit');
            // Route::post('/staff/mahasiswa/edit/{id}/action','update')->name('staff.update');
            // Route::post('/staff/mahasiswa/delete/{id}/action', 'delete')->name('staff.delete');
        });

        // Route::resource('customers', CustomerController::class);
    });
});
