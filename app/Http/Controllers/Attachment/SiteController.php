<?php

namespace App\Http\Controllers\Attachment;

use App\AdminModels\Category;
use App\AdminModels\Post;
use App\AdminModels\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function Index ()
    {
        //жадная загрузка и пагинация
        $posts = Post::with('comments')
            ->orderBy('created_at','DESC')
            ->paginate(5);
        $categories = Category::all();
        $tags = Tag::all();

        return view('attachment.index', compact('posts','categories','tags'));
    }

    public function PostShow ($id)
    {
        $post = Post::findOrFail($id);
        return view('attachment.post',compact('post'));
    }

}
