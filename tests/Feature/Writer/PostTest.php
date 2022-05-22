<?php

namespace Tests\Feature\Writer;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * post require validation
     */
    public function test_post_validation_for_test()
    {
        $this->makeWriterLogin();
        $res = $this->post(route('store.post.writer'));
        $res->assertSessionHasErrors('title');
    }

    /**
     * post slug must be unique
     */
    public function test_post_slug_must_be_unique_validation()
    {

        $this->makeWriterLogin();

        $post = Post::factory()
                    ->create();

        $cats = Category::factory(3)
                        ->create();;

        //post data for save to db
        $data = [
            "title"      => 'test title',
            "slug"       => $post->slug,
            "cover"      => 'http://blog.test/storage/photos/2/stream.jpg',
            "body"       => 'this is body ',
            "categories" => [0 => 1, 1 => 2, 2 => 3],
            "tags"       => [0 => 'finance', 1 => 'politics', 2 => 'computer'],
        ];


        $res = $this->post(route('store.post.writer'), $data);

        $res->assertSessionHasErrors('slug');

    }

    /**
     * create new post
     */
    public function test_create_new_post()
    {
        //writer login
        $writer = $this->makeWriterLogin();

        //create some categoreis
        $cats = Category::factory(4)
                        ->create();;

        //post data for save to db
        $data = [
            "title"      => 'test title',
            "slug"       => 'test-title',
            "cover"      => 'http://blog.test/storage/photos/2/stream.jpg',
            "body"       => 'this is body ',
            "categories" => [0 => 1, 1 => 2, 2 => 3],
            "tags"       => [0 => 'finance', 1 => 'politics', 2 => 'computer'],
        ];

        //send request to route
        $rep = $this->post(route('store.post.writer'), $data);

        //check post count
        $this->assertEquals(1, Post::count());

        //check post tags count
        $this->assertEquals(3, $writer->posts[0]->tags()
                                                ->count());
        //check post categories count
        $this->assertEquals(3, $writer->posts[0]->categories()
                                                ->count());
    }

    public function test_writer_posts_list()
    {

        $writer = $this->makeWriterLogin();

        $posts = Post::factory($writer)
                     ->create();

        $res = $this->get(route('list.post.writer'));

        $res->assertViewIs('writer.list');

        $res->assertViewHas('posts');
    }

    public function test_select_a_post_foredit()
    {
        $this->withoutExceptionHandling();
        $writer = $this->makeWriterLogin();

        //create post
        $post = Post::factory()
                    ->create(['writer_id' => $writer->id]);


        $categories = Category::factory()
                              ->count(5)
                              ->create();

        $res = $this->get(route('edit.post.writer', $post->id));

        $res->assertViewIs('writer.editpost');
        $res->assertViewHas('post');
        $res->assertViewHas('categories');
    }

    public function test_only_owner_of_post_can_edit()
    {
        $writer = $this->makeWriterLogin();

        //create psot
        $post = Post::factory()
                    ->create();

        $res = $this->get(route('edit.post.writer', $post->id));
        $res->assertForbidden();
    }


    public function test_none_owner_post_not_allowed_for_update()
    {

        $writer = $this->makeWriterLogin();

        $owner = User::factory()
                     ->writer()
                     ->create();

        $post = Post::factory(['writer_id' => $owner->id])
                    ->create();

        $res = $this->put(route('update.post.writer', $post->id), ['title' => 'updated title']);

        $res->assertForbidden();
    }

    /**
     * slug unique and require validation when updating
     */
    public function test_unique_slug_and_required_validation_for_updating_a_post_by_owner()
    {
        $writer = $this->makeWriterLogin();

        //post
        $post = Post::factory()
                    ->state(['writer_id' => $writer->id])
                    ->hasCategories(3)
                    ->hasTags(3)
                    ->create();

        //another post
        $post_2 = Post::factory()
                      ->create();


        //request
        $data = ['slug' => $post_2->slug];

        $res = $this->put(route('update.post.writer', $post->id), $data);

        $res->assertSessionHasErrors('title');//مابقی فیلد ها رو ولیدیشن میکنه و خطا میده اما من فقط تایتیل رو گذاشتم
        $res->assertSessionHasErrors('slug'); //اسلاگ، چون از اسلاگ post_2 استفاده کرده لذا خطای عدم یونیک بودن میده


    }

    /**
     * update a post
     */
    public function test_updae_a_post_by_owner()
    {

        $writer = $this->makeWriterLogin();

        //create 10 categories
        $cats = Category::factory(10)
                        ->create();

        //create 2 tag
        Tag::create(['slug' => 'bussiness', 'title' => 'bussiness']);
        Tag::create(['slug' => 'laptop', 'title' => 'laptop']);

        //create a post with categories(3) and tags(3)
        $post = Post::factory()
                    ->state(['writer_id' => $writer->id])
                    ->hasTags(3)
                    ->hasCategories(3)
                    ->create();

        $old_cat_id = $post->categories[0]->id;//چون رابطه چند به چند است خواستیم از قبل هم کتگوری باشه تا دستوری sync رو کامل چک کنیم

        $data = [
            'title'      => 'updated title',
            'slug'       => 'updated-title',
            'cover'      => $post->cover,
            'body'       => $post->body,
            'categories' => [
                0 => $old_cat_id,
                1 => 3, //new category
                2 => 4, //new category
                3 => 5  //new category
            ],
            'tags'       => [
                2 => $post->tags[2]->slug,//old tag
                0 => 'laptop',      //aleary exist in tags table
                1 => 'bussiness',   //already exist in tags table
                3 => 'test-tag'     //new tag (first must be save in tags table then save in pivot table)
            ]
        ];

        //send request for update
        $res = $this->put(route('update.post.writer', $post->id), $data);

        //check posts table update
        $this->assertDatabaseHas('posts', ['id' => $post->id, 'slug' => 'updated-title']);

        //check synced category in post_category table
        $this->assertDatabaseHas('post_category', ['post_id' => $post->id, 'category_id' => 3]);
        $this->assertDatabaseHas('post_category', ['post_id' => $post->id, 'category_id' => 4]);
        $this->assertDatabaseHas('post_category', ['post_id' => $post->id, 'category_id' => 5]);
        $this->assertDatabaseHas('post_category', ['post_id' => $post->id, 'category_id' => $old_cat_id]);

        //check synced tags in post_tag table
        $this->assertDatabaseCount('post_tag', 4);

        //check success session message
        $res->assertSessionHas('update-succ', 'post Updated Successfully');
    }

    /**
     * delete a post
     */
    public function test_delete_a_post()
    {
        $this->withoutExceptionHandling();

        $writer = $this->makeWriterLogin();
        $post = Post::factory()
                    ->state(['writer_id' => $writer->id])
                    ->hasCategories(3)
                    ->hasTags(3)
                    ->create();

        $cat_id = $post->categories[0]->category_id;
        $tag_id = $post->tags[0]->tag_id;


        $res = $this->delete(route('delete.post.writer', $post->id));

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
        $this->assertDatabaseMissing('post_tag', ['tag_id' => $tag_id]);
        $this->assertDatabaseMissing('post_category', ['category_id' => $cat_id]);

        $res->assertRedirect(route('list.post.writer'));

        $res->assertSessionHas('delete-succ', 'Post Deleted SuccessFully');
    }

    public function test_only_owner_can_see_comments()
    {
        $writer = $this->makeWriterLogin();

        $writer2 = User::factory()
                       ->writer()
                       ->create();

        $post = Post::factory()
                    ->state(['writer_id' => $writer2->id])
                    ->hasTags(3)
                    ->hasCategories(3)
                    ->create();


        $res = $this->get(route('comment.post.writer', $post->id));

        $res->assertForbidden();
    }

    public function test_show_a_post_comments()
    {
        $writer = $this->makeWriterLogin();

        $post = Post::factory()
                    ->state(['writer_id' => $writer->id])
                    ->hasTags(3)
                    ->hasComments(3)
                    ->create();
        //create comment
        Comment::factory()
               ->count(10)
               ->state(['post_id' => $post->id])
               ->create();


        $this->get(route('comment.post.writer', $post->id))
             ->assertViewIs('writer.commentlist');


    }

    /**
     * show writer all posts
     */
    public function test_select_post_by_title()
    {
        $write = User::factory()
                     ->writer()
                     ->create();

        //10 posts
        $posts = Post::factory()
                     ->state(['writer_id' => $write->id, 'body' => 'im body'])
                     ->count(10)
                     ->hasTags(3)
                     ->hasCategories(3)
                     ->create();

        $this->get(route('get.post.writer', $write->id))
             ->assertViewIs('postlist')
             ->assertViewHas('posts');

        $this->assertDatabaseCount('posts', 10);

    }

    public function test_get_posts_by_category()
    {
        $writer = User::factory()
                      ->writer()
                      ->create();
        $posts = Post::factory()
                     ->state(['writer_id' => $writer->id])
                     ->count(5)
                     ->hasCategories(4)
                     ->create();

        $cats = Category::query()
                        ->limit(1)
                        ->get()
                        ->pluck('id');
        //dd($cats);

        $this->get(route('get.categories.post'));
    }

    /*
     |------------------------------
     | private methods
     |------------------------------
     |
     |
     |
     */

    /**
     * make writer and loged In to web app
     */
    public function makeWriterLogin()
    {
        $writer = User::factory()
                      ->writer()
                      ->create();

        $this->actingAs($writer);
        return $writer;
    }
}
