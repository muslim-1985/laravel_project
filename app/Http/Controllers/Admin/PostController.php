<?php

namespace App\Http\Controllers\Admin;

use App\AdminModels\Category;
use App\AdminModels\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModels\Post;

class PostController extends Controller
{
    public function index () {
        //жадная загрузка
        $posts = Post::with('category')->get();
        //вывод изображений из БД и преобразование в массив
        foreach ($posts as $post)
        {
           $images = explode(' ', $post->img);
        }

        return view('admin.post.index', compact('posts', 'images'));
    }

    public function create () {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create',compact('categories','tags'));
    }

    public function store (Request $request) {
      $request->validate ([
        'title' => 'required|unique:posts|max:255',
        'desc' => 'required',
      ]);

      //сохранение данных в БД
      $post = Post::create($request->all());
      if($request->input('tags')) {
          $this->syncTags($post, $request->input('tags'));
      }
      //редирект на индексную страницу
      return redirect('admin');
       //return dump($request);
    }
    //функция записи данных id полей из массива request в промежуточную таблицу post_tags
    private function syncTags (Post $post, array $tags)
    {
        $post->tags()->sync($tags, false);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit')->withPost($post);
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
            'desc' => 'required',
        ]);
        Post::find($id)->update($request->all());
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('admin');
    }
}
