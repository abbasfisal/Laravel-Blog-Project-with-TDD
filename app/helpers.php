<?php

use Illuminate\Support\Str;

if (!function_exists('SLUG')) {
     function SLUG(string $title){
        return Str::replace(' ', '-', Str::lower($title));
    }
}
