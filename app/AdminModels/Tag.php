<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];

    public function posts ()
    {
        return $this->belongsToMany('App\AdminModels\Post', 'posts_tags', 'tag_id', 'post_id');
    }
}
