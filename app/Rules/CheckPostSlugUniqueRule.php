<?php

namespace App\Rules;

use App\Models\Post;
use Illuminate\Contracts\Validation\Rule;

class CheckPostSlugUniqueRule implements Rule
{
    /**
     * @var Post
     */
    private $post;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {

        //
        $this->post = $post;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $posts = Post::all()
                     ->except(['id' => $this->post->id])
                     ->toArray();

        foreach ($posts as $post) {
            if($post['slug'] ==$value){
                return  false;
            }

        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Slug Must Be Unique.';
    }
}
