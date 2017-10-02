<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'desc', 'content', 'icon', 'img'];
}
