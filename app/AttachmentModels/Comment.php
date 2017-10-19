<?php

namespace App\AttachmentModels;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['title', 'content', 'parent_id',];

    public function posts()
    {
        return $this->belongsTo('App\AdminModels\Post','post_id');
    }
    public function admins()
    {
        return $this->belongsTo('App\Admin','admin_id');
    }
    public function childs ()
    {
        return $this->hasMany('App\AttachmentModels\Comment','parent_id','id');
    }
}
