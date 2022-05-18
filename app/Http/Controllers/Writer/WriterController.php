<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\UpdateWriterPostRequest;
use App\Http\Requests\Writer\EditPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

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
    public function updateWriterPost(UpdateWriterPostRequest $request, Post $post)
    {

        try {
            DB::beginTransaction();

            //update post
            $post->update($request->only(['title', 'slug', 'cover', 'body']));

            $cat_id_sync = [];

            //sync post_category table
            $post->categories()
                 ->sync($request->categories);

            //ذخیره آی دی تگ ها و در نهایت سینک کردن آی دی های موجود در این آرایه
            $tag_ids = [];

            //برای تگ ابتدا چک میکنیم که تگ ها در جدل تگ وجود داره یا نه
            //اگه وجود نداشت یک تگ جدید در جدول تگ ایجاد میشه
            //اگه وجود داشت فقط id اون تگ رو از جدول تگ رو در ارایه ذخیره میکنیم
            foreach ($request->tags as $tag) {

                //check tag existence in tags table
                $is_tag_exist = Tag::query()
                                   ->where('title', $tag)
                                   ->orWhere('slug', SLUG($request->slug))
                                   ->get();
                //tag not exist
                if ($is_tag_exist->count() === 0) {
                    //create new tag
                    $tag_id = Tag::query()
                                 ->create([
                                     Tag::col_title => $tag,
                                     Tag::col_slug  => SLUG($tag)
                                 ]);

                    //ذخیره آی دی تگ جدید ذخیره شده در جدول تگ به صورت کی ولیو
                    $tag_ids[$tag_id->id] = $tag_id->id;

                } else {
                    //tag was exist in tags table

                    //ذخیره آی دی تگ موجود در جدول تگ به صورت کی ولیو
                    $tag_ids[$is_tag_exist[0]['id']] = $is_tag_exist[0]['id'];

                }
            }

            //syn post_tag table
            $post->tags()
                 ->sync($tag_ids);

            DB::commit();
            return redirect(route('list.post.writer'))->with('update-succ', 'post Updated Successfully');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect(route('list.post.writer'))->with('update-fail', 'Oops,we can not update the post,try a gain later');
        }


    }

    public function deletePost(DeletePostRequest $request, Post $post)
    {
        try {

            DB::beginTransaction();

            $post->tags()
                 ->detach();

            $post->categories()
                 ->detach();

            $post->delete();

            DB::commit();
            return redirect(route('list.post.writer'))->with('delete-succ', 'Post Deleted SuccessFully');
        } catch (\Exception $e) {
            Log::error($e);
            dd($e);
            DB::rollBack();
        }
    }
}

