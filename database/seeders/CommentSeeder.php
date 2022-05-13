<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = Factory::create();

        //create 3 normall user
        list($user1, $user2, $user3) = $this->createUsers();

        $mainCommentId = null;
        $post = null;

        //create post
        list($post, $mainCommentId) = $this->createPost($f, $user1, $post, $mainCommentId);

        //create Reply
        $this->createReplyaComment($mainCommentId, $user2, $post, $f, $user3);


    }

    /**
     * @param $mainCommentId
     * @param $user2
     * @param $post
     * @param \Faker\Generator $f
     * @param $user3
     */
    private function createReplyaComment($mainCommentId, $user2, $post, \Faker\Generator $f, $user3): void
    {
        Comment::query()->where('id', $mainCommentId)->create([
            'user_id' => $user2,
            'post_id' => $post->id,
            'reply_id' => $mainCommentId,
            'show' => true,
            'text' => 'Reply Comment Id ' . $mainCommentId . ' = ' . $f->text(60)
        ]);

        Comment::query()->where('id', $mainCommentId)->create([
            'user_id' => $user3,
            'post_id' => $post->id,
            'reply_id' => $mainCommentId,
            'show' => true,
            'text' => 'Reply Comment Id ' . $mainCommentId . ' = ' . $f->text(60)
        ]);
    }

    /**
     * @return array
     */
    private function createUsers(): array
    {
        $user1 = User::factory()->count(1)->user()->create()[0]['id'];
        $user2 = User::factory()->count(1)->user()->create()[0]['id'];
        $user3 = User::factory()->count(1)->user()->create()[0]['id'];
        return array($user1, $user2, $user3);
    }

    /**
     * @param \Faker\Generator $f
     * @param $user1
     * @param $post
     * @param $mainCommentId
     * @return array
     */
    private function createPost(\Faker\Generator $f, $user1, $post, $mainCommentId): array
    {
        Post::factory()->create()->each(function ($p) use ($f, $user1, &$post, &$mainCommentId) {
            $post = $p;
            $mainCommentId = $p->comments()->create([
                'user_id' => $user1,
                'show' => true,
                'text' => 'Main Comment ' . $f->text(60)
            ])->id;

        });
        return array($post, $mainCommentId);
    }
}
