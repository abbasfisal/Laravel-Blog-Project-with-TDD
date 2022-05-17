<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\Writer\EditPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WriterController extends Controller
{
    public function showDashboard()
    {
        return view('writer.index');
    }

    /**
     * show new post form
     */
    public function newPost()
    {
        $categories = Category::all();
        return view('writer.create', compact('categories'));
    }

    public function storePost(CreatePostRequest $request)
    {


        try {
            DB::beginTransaction();

            /**
             * Tags
             */
            $tags = $request->tags;
            $tag_ids = [];
            foreach ($tags as $tag) {
                $tag_ids[] = Tag::query()
                                ->where(Tag::col_slug, SLUG($tag))
                                ->orWhere(Tag::col_title, $tag)
                                ->firstOrCreate([
                                    Tag::col_slug  => SLUG($tag),
                                    Tag::col_title => $tag
                                ]);
            }

            /**
             * categories
             */
            $cats = $request->categories;
            $cat_ids = [];
            foreach ($cats as $cat) {
                $cat_ids[] = Category::query()
                                     ->findOrFail($cat);
            }


            $post = Post::query()
                        ->create([
                            Post::col_writer_id => Auth::id(),
                            Post::col_title     => $request->title,
                            Post::col_slug      => SLUG(rand(0, 3) . $request->title),
                            Post::col_cover     => $request->cover,
                            Post::col_body      => $request->body,
                        ]);


            $post->categories()
                 ->saveMany($cat_ids);


            $post->tags()
                 ->saveMany($tag_ids);

            DB::commit();


        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            dd($e);

        }

    }

    /**
     * show all logedIn writer posts
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPostsList()
    {
        //TODO : complete me=> writer can see just its posts
        $posts = Post::query()
                     ->where(Post::col_writer_id, Auth::id())
                     ->paginate(5);

        return view('writer.list', compact('posts'));
    }

    public function editWriterPost(EditPostRequest $request, Post $post)
    {
        $categories = Category::all();
        //TODO create request(policy) writer just can edit its posts
        return view('writer.editpost', compact('post', 'categories'));
    }

    /**
     * update a post
     */
    public function updateWriterPost(Post $post)
    {
        //write test for gate post

        dd('h');
    }
}

