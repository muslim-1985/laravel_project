<?php

namespace App\Http\Controllers\Attachment;

use App\AdminModels\Category;
use App\AdminModels\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    public function Index ()
    {
        $posts = Post::all();
        $head = Category::where('slug','head')->first();

        return view('attachment.index', compact('posts','head'));
    }
    public function PostShow ($id)
    {
        $post = Post::find($id);
        return view('attachment.post',compact('post'));
    }

}
