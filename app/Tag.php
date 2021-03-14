<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag',
    ];
    public function post()
    {
        return $this->belongsToMany('App\Post','posts_tags');
    }
}
