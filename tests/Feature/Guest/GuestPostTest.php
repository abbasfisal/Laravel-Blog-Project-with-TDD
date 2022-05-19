<?php

namespace Tests\Feature\Guest;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestPostTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function test_see_posts_in_index_page()
    {
        $this->get(route('index.guest'))
             ->assertViewIs('index')
             ->assertViewHas('posts');

    }

    public function test_see_a_single_post()
    {
        $post = Post::factory()
                    ->create();
        $this->get(route('single.post.guest', [$post->id, $post->slug]))
             ->assertViewIs('singlepost')
            ->assertViewHas('post');
    }
}
