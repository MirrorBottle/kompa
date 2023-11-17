<?php

use App\Http\Controllers\Admin\CommissionRateController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\WebController;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserCommissionRateController;

use App\Http\Controllers\Finance\BalanceBookController;
use App\Http\Controllers\Finance\BalanceBookItemController;
use App\Http\Controllers\Finance\SalaryController as FinanceSalaryController;

use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\SalesController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\SalaryController as ManagerSalaryController;
use App\Http\Controllers\User\SalaryController as UserSalaryController;



use App\Models\UserCommissionRate;

use App\Http\Controllers\Manager\UserCommissionRateController as ManagerUserCommissionRateController;


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

    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::post('/user/profile/changePass', [ProfileController::class, 'changePass'])->name('user.changePass');


    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource("users", UserController::class);
        Route::resource("commission-rates", CommissionRateController::class);
        Route::resource("user-commission-rates", UserCommissionRateController::class)->except(['index', 'create', 'show']);
        Route::get('user-commission-rates/{user_id}', [UserCommissionRateController::class, 'index'])->name("user-commission-rates.index");
        Route::get('user-commission-rates/create/{user_id}', [UserCommissionRateController::class, 'create'])->name("user-commission-rates.create");

        Route::resource("teams", TeamController::class);
    });

    Route::group(['namespace' => 'Master', 'prefix' => 'master', 'as' => 'master.', 'middleware' => 'role:master'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    });

    Route::group(['prefix' => 'finance', 'as' => 'finance.', 'middleware' => 'role:finance'], function () {
        Route::group(['namespace' => 'Finance'], function() {
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource("salaries", FinanceSalaryController::class)->except(['edit', 'create']);
            Route::resource("balance-books", BalanceBookController::class);
            Route::resource("balance-book-items", BalanceBookItemController::class)->except(['index', 'create']);
            Route::get("balance-book-items/{balance_book_id}", [BalanceBookItemController::class, 'create'])->name("balance-book-items.create");
        });
        Route::resource("commission-rates", CommissionRateController::class);
    });

    Route::group(['namespace' => 'Manager', 'prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'role:manager'], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/team', 'TeamController@index')->name('team.index');
        Route::resource("user-commission-rates", ManagerUserCommissionRateController::class)->except(['index', 'create', 'show']);
        Route::get('user-commission-rates/{user_id}', [ManagerUserCommissionRateController::class, 'index'])->name("user-commission-rates.index");
        Route::get('user-commission-rates/create/{user_id}', [ManagerUserCommissionRateController::class, 'create'])->name("user-commission-rates.create");
        // Route::resource("salaries", ManagerSalaryController::class)->except(['create']);
        Route::get('sales/create/{user_id}', [ManagerSalaryController::class, 'create'])->name("sales.create");
        Route::post('sales/create/action', [ManagerSalaryController::class, 'store'])->name("sales.store");
        Route::get('/salary', [ManagerSalaryController::class, 'show'])->name("salary.show");
        Route::get('/salary/edit/{id}', [ManagerSalaryController::class, 'edit'])->name("salary.edit");
        Route::post('/salary/edit/action/{id}', [ManagerSalaryController::class, 'update'])->name("salary.update");


        // Route::get('/sales/create/action', 'SalaryController@store')->name('sales.store');







    });

    Route::group(['namespace' => 'User', 'prefix' => 'user', 'as' => 'user.', 'middleware' => 'role:user'], function () {
        Route::get(
            '/dashboard',
            'DashboardController@index'
        )->name('dashboard');
        Route::resource('customers', CustomerController::class);
        Route::resource('sales', SalesController::class);
        Route::resource('salary', UserSalaryController::class);
    });

    Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
        Route::get("detail", [CompanyController::class, 'detail'])->name("detail");
        Route::get("customer", [CompanyController::class, 'customer'])->name("customer");
        Route::put("update", [CompanyController::class, 'update'])->name("update");
    });
});
