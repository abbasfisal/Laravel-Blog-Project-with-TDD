<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = 'tag ' . $this->faker->jobTitle;
        return [
            Tag::col_title => $title,
            Tag::col_slug => Str::slug($title)
        ];
    }
}
