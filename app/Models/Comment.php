<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    const col_id = 'id';
    const col_user_id = 'user_id';
    const col_post_id = 'post_id';
    const col_reply_id = 'reply_id';
    const col_show = 'show';
    const col_text = 'text';


    protected $fillable = [
        self::col_user_id,
        self::col_post_id,
        self::col_reply_id,
        self::col_show,
        self::col_text,
    ];


    /*
     |------------------------------
     | Relations
     |------------------------------
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * relation with itself
     */
    public function reply()
    {
        return $this->belongsTo(
            Comment::class,
            self::col_reply_id,
            self::col_id
        );
    }


}
