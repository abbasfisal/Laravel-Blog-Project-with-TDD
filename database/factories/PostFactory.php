<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Psy\Util\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->jobTitle;
        return [
            Post::col_writer_id => User::factory()->writer(),
            Post::col_title =>$title,
            Post::col_slug =>\Illuminate\Support\Str::slug($title),
            Post::col_body=>$this->faker->text,
            Post::col_cover =>$this->faker->imageUrl
        ];
    }
}
