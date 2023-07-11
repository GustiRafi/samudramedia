<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login',[AuthController::class, 'loginView'])->name('login.view');
});
