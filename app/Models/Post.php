<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    /*
     |------------------------------
     | Define Posts Table Coloumns
     |------------------------------
     |
     */
    const col_id = 'id';
    const col_title = 'title';
    const col_slug = 'slug';
    const col_body = 'body';
    const col_writer_id = 'writer_id';
    const col_cover = 'cover';

    protected $fillable = [
        self::col_writer_id,//user_id fk
        self::col_title,
        self::col_slug,
        self::col_body,
        self::col_cover
    ];


    //-------------

    /*
     |------------------------------
     | Relations
     |------------------------------
     |
     */

    public function writer()
    {
        return $this->belongsTo(User::class, self::col_writer_id, User::col_id);
    }

    /**
     * Has Many with Comments table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
