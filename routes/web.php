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
     ->name('show.login')
     ->middleware('guest');

Route::post('/login', [AutheticateController::class, 'login'])
     ->name('login');

Route::get('/logout', [AutheticateController::class, 'logout'])
     ->name('logout')
     ->middleware('auth');

/*
 |------------------------------
 | admin routes
 |------------------------------
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {

    Route::get('/dashboard', [AdminController::class, 'showDashboard'])
         ->name('dashboard.admin');

    /*
     |------------------------------
     | for Writer
     |------------------------------
     |
     |
     |
     */
    Route::get('/writer/new', [AdminController::class, 'newWriterForm'])
         ->name('new.writer.admin');

    Route::post('/writer/store', [AdminController::class, 'storeWriter'])
         ->name('store.writer.admin');

    Route::get('/writer/list', [AdminController::class, 'showWriterList'])
         ->name('list.writer.admin');

    Route::get('/writer/posts/{user}', [AdminController::class, 'showWriterPosts'])
         ->name('posts.writer.admin');

    /*
     |------------------------------
     | for Category
     |------------------------------
     |
     |
     |
     */
    Route::get('/category/new', [AdminController::class, 'newCategory'])
         ->name('new.category.admin');
    Route::post('/category/store', [AdminController::class, 'storeNewCategory'])
         ->name('store.category.admin');

    Route::get('/category/list', [AdminController::class, 'showCategoryList'])
         ->name('list.category.admin');

    Route::get('/category/edit/{category}', [AdminController::class, 'editCategory'])
         ->name('edit.category.admin');

    Route::put('/category/update/{category}', [AdminController::class, 'updateCategory'])
         ->name('update.category.admin');
});

