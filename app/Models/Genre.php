<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;

    function songs(){
        return $this->hasMany(Song::class);
    }
}
