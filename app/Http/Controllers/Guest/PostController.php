<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * show posts in index.blade.php
     */
    public function index()
    {

        $posts = Post::query()
                     ->paginate(2);

        $tags = Tag::query()
                   ->inRandomOrder()
                   ->limit(6)
                   ->get()
                   ->toArray();


        return view('index', compact('posts', 'tags'));
    }


    public function showSinglePost(Post $post, $slug)
    {

        return view('singlepost', compact('post'));
    }

    /**
     * select posts by category
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getPostByCategories(Category $category)
    {

        $posts = Post::query()
                     ->whereHas('categories', function ($q) use ($category) {
                         $q->where('category_id', $category->id);
                     })
                     ->paginate(4);

        return view('search', compact('posts'));

    }

    /**
     * select posts by tag
     * @param Tag $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getPostByTags(Tag $tag)
    {


        $posts = $tag->posts()
                     ->paginate(3);

        return view('search', compact('posts'));
    }
}
