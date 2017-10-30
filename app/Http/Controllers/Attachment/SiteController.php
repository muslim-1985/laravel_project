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
        $block = Category::where('slug','block1')->first();
        $portfolio = Category::where('slug','portfolio')->first();

        return view('attachment.index', compact('posts','head','block','portfolio'));
    }

    public function PostShow ($id)
    {
        $post = Post::findOrFail($id);
        return view('attachment.post',compact('post'));
    }

    public function SingleProject($id)
    {
        $project = Post::find($id);
        return view('attachment.single-project',compact('project'));
    }
}
