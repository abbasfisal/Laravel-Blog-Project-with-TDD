<?php

namespace Tests\Feature\Writer;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_post_validation_for_test()
    {
        $this->makeWriterLogin();
        $res = $this->post(route('store.post.writer'));
        $res->assertSessionHasErrors('title');
    }

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
        $writer = \App\Models\User::factory()
                                  ->writer()
                                  ->create();

        $this->actingAs($writer);
        return $writer;
    }
}
