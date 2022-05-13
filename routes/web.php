<?php

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
    //return view('welcome');

  $post =  \App\Models\Post::query()->where('id',1)->firstOrFail();

      /* $post->likes()
       ->create([
           'user_id'=>6
       ]);*/

       $comment = \App\Models\Comment::query()->where('id',2 )->firstOrFail();

       $comment->likes()->create([
           'user_id'=>6
       ]);


});
