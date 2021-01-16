<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController,
    App\Http\Controllers\Admin\BusController,
    App\Http\Controllers\Admin\SeatClassController,
    App\Http\Controllers\Admin\SeatManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin Authentication
Route::get('admin', [DashboardController::class, 'AdminLoginForm'])->name('admin.login');


Route::prefix('admin')->name('admin.')->group(function () {

    //dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Bus
    Route::resource('buses', BusController::class);
    //Seat Class
    Route::resource('seat-classes', SeatClassController::class);

    Route::get('Seat-gen', [SeatManagementController::class, 'SeatGenPage'])->name('SeatGenPage');
    Route::post('Seat-gen-pro', [SeatManagementController::class, 'SeatGenProcess'])->name('SeatGenPrc');
    Route::get('Seat-plan', [SeatManagementController::class, 'SeatPlan'])->name('SeatPlan');

    Route::get('Seat-class-gen/{seatPlanId}', [SeatManagementController::class, 'SeatClassGenPage'])->name('SeatClassGenPage');
    Route::post('Seat-class-pro', [SeatManagementController::class, 'SeatClassGenProcess'])->name('SeatClassGenProcess');

});
