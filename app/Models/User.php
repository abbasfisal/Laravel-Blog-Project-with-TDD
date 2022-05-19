<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * define user types
     *
     */

    const type_admin = 'admin';
    const type_writer = 'writer';
    const type_user = 'user';

    const types = [
        self::type_admin,
        self::type_writer,
        self::type_user
    ];
    //----------------

    /**
     * define users table columns name
     *
     */
    const col_id = 'id';
    const col_name = 'name';
    const col_email = 'email';
    const col_password = 'password';
    const col_type = 'type';
    //-----------


    protected $fillable = [
        self::col_name,
        self::col_email,
        self::col_password,
        self::col_type
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*
     |------------------------------
     | Methods
     |------------------------------
     |
     |
     |
     */

    public function isAdmin()
    {
        return $this->type === User::type_admin;
    }

    /*
     |------------------------------
     | Relations
     |------------------------------
     |
     */
    public function posts()
    {
        return $this->hasMany(Post::class, Post::col_writer_id, self::col_id);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}


