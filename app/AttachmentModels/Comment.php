<?php

namespace App\AttachmentModels;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['title', 'content',];

    public function posts()
    {
        return $this->belongsTo('App\AdminModels\Post','post_id');
    }
}