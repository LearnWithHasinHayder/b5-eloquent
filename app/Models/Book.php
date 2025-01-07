<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $hidden = ['created_at','updated_at','pivot'];
    function authors(){
        return $this->belongsToMany(Author::class, 'author_books');
    }
}
