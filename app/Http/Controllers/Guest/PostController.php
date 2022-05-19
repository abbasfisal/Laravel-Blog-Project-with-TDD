<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * show posts in index.blade.php
     */
    public function index()
    {

        $posts = Post::with('tags', 'categories')
                     ->paginate(4);

        return view('index' , compact('posts'));
    }


    public function showSinglePost(Post $post ,$slug)
    {

        return view('singlepost',compact('post'));
    }
}
