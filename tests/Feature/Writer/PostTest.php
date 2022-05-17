<?php

namespace Tests\Feature\Writer;

use App\Models\Category;
use App\Models\Post;
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

        $posts = Post::factory($writer)->create();

        $res = $this->get(route('list.post.writer'));

        $res->assertViewIs('writer.list');

        $res->assertViewHas('posts');
    }

    /*public function test_edit()
    {
        //route
        //gate writer
        //select post
        //check view
        //check data in view
        //update data in db
        //check data update
    }*/
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
