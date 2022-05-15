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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {

    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard.admin');


    Route::get('/writer/new', [AdminController::class, 'newWriterForm'])
        ->name('new.writer.admin');

    Route::post('/writer/store', [AdminController::class, 'storeWriter'])
        ->name('store.writer.admin');

    Route::get('/writer/list', [AdminController::class, 'showWriterList'])
        ->name('list.writer.admin');
});

