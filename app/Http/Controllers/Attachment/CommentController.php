<?php

namespace App\Http\Controllers\Attachment;

use App\Admin;
use App\AdminModels\Post;
use App\AttachmentModels\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function Index()
    {
        $comments = Comment::with('admins')->get();
        return view('admin.comment.index',compact('comments'));
    }


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
        //привязываем комментарий к текущему посту
        $comment->posts()->associate($post);
        //связываем текущего авторизированного пользователя (гард 'admin', не забываем) и получаем его id
        $comment->admins()->associate(\Auth::guard('admin')->id());
        $comment->save();
        \Session::flash('success','Комментарий успешно добавлен');
        return redirect()->route('post.single',$post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate ([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);
        Comment::find($id)->update($request->all());
        return redirect('admin/comment');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return redirect('admin/comment');
    }
}
