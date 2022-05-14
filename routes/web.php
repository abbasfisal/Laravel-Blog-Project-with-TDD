<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AutheticateController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

/*
 |------------------------------
 | Auth routes
 |------------------------------
 */
Route::get('/login', [AutheticateController::class, 'showLoginForm'])
    ->name('show.login')->middleware('guest');

Route::post('/login', [AutheticateController::class, 'login'])
    ->name('login');

Route::get('/logout', [AutheticateController::class, 'logout'])
    ->name('logout')->middleware('auth');

/*
 |------------------------------
 | admin routes
 |------------------------------
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard.admin');
});
