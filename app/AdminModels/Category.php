<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];
    public function posts ()
    {
        return $this->hasMany('App\AdminModels\Post','cat_id');
    }
}
