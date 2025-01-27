<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    function songs(){
        return $this->hasMany(Song::class);
    }
}
