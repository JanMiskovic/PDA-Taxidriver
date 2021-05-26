<?php

use App\Http\Controllers\DriveController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\TaxiController;
use App\Http\Controllers\StatController;
use Illuminate\Support\Facades\Route;

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

Route::resource('driver', DriverController::class);
Route::resource('taxi', TaxiController::class);
Route::resource('shift', ShiftController::class);
Route::resource('drive', DriveController::class);
Route::resource('stats', StatController::class);