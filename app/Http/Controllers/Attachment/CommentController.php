<?php

namespace App\Http\Controllers\Attachment;

use App\AdminModels\Post;
use App\AttachmentModels\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function Store(Request $request, $post_id)
    {
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required|min:6',
        ]);
        $post = Post::find($post_id);
        $comment = new Comment();
        $comment->title = $request->input('title');
        $comment->content = $request->input('content');
        $comment->approved = true;
        $comment->posts()->associate($post);
        $comment->save();
        \Session::flash('success','Комментарий успешно добавлен');
        return redirect()->route('post.single',$post_id);
    }
}
