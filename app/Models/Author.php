<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $hidden = ['created_at','updated_at','pivot'];
    function books(){
        return $this->belongsToMany(Book::class,'author_books');
    }
}
