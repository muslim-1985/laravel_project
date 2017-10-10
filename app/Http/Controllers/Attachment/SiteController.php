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
        $post = Post::all();
        $head = Category::where('slug','head')->first();

        return view('attachment.index', compact('post','head'));
    }

}
