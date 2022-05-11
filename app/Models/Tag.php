<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    /**
     * define tables columns
     */
    const col_title = 'title';
    const col_slug = 'slug';

    //-------------------------


    protected $fillable = [
        self::col_title,
        self::col_slug
    ];
}
