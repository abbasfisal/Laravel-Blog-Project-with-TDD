<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AutheticateController;
use App\Http\Controllers\Writer\WriterController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;


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

Route::post('/logout', [AutheticateController::class, 'logout'])
     ->name('logout')
     ->middleware('auth');

/*
 |------------------------------
 | admin routes
 |------------------------------
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {

    //Dashboard
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

/*
 |------------------------------
 |  Writer Routes
 |------------------------------
 */
Route::group(['prefix' => 'writer', 'middleware' => ['auth']], function () {

    //Dashboard
    Route::get('/dashboard', [WriterController::class, 'showDashboard'])
         ->name('dashboard.writer');

    /*
     |------------------------------
     | for post
     |------------------------------
     */
    Route::get('/post/new', [WriterController::class, 'newPost'])
         ->name('new.post.writer');

    Route::post('/post/store', [WriterController::class, 'storePost'])
         ->name('store.post.writer');

    Route::get('/post/list', [WriterController::class, 'showPostsList'])
         ->name('list.post.writer');

    //edit
    Route::get('/post/edit/{post}', [WriterController::class, 'editWriterPost'])
         ->name('edit.post.writer');

    //update
    Route::put('/post/update/{post}', [WriterController::class, 'updateWriterPost'])
         ->name('update.post.writer');

    //delete
    Route::delete('/post/delete/{post}', [WriterController::class, 'deletePost'])
         ->name('delete.post.writer');
});


/*
 |------------------------------
 | Laravel File Manager LMF
 |------------------------------
 |
 |
 |
 */
//TODO add middleware can:admin,writer
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
