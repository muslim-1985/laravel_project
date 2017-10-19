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
        //жадная загрузка и пагинация
        $posts = Post::with('category')->paginate(5);

        return view('admin.post.index', compact('posts'));
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
        $images = explode(' ', $post->img);
        return view('admin.post.show',compact('images','post'));
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
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact('post','categories', 'tags'));
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
            'title' => 'unique:posts|max:255',
            'desc' => 'max:255',
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->desc = $request->input('desc');
        $post->slug = $request->input('slug');
        $post->content = $request->input('content');
        $post->cat_id = $request->input('cat_id');

        //удаляем старые теги
        if($post->tags)
        {
            $post->tags()->detach();
            $post->tags()->delete();
        }
        //добавляем новые
        if($request->input('tags'))
        {
            $this->syncTags($post, $request->input('tags'));
        }
        //сохранение обновленных файлов в папке на сервере public/images(создаем папку) и присвоение им уникального имени
        //перед сохранением обязательно меняем стандартный путь функции store() в файле config/filesystems.php
        //'root'=>public_path('images')
        $arr=[];
        if($request->file('img'))
        {
            foreach ($request->file('img') as $image)
            {
                $imageName = $image->store('image');
                $arr[] = $imageName;
            }
        }
        //преобразование обновленных файлов в строку
        $images = implode(' ', $arr);
        $post->img = $images;
        //сохранение в БД
        $post->save();
        return redirect('admin');
    }
    //фильтр постов по категориям
    public function CategoryFilter($id)
    {
        $category = Category::find($id);
        return view('admin.post.category-filter',compact('category'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return redirect('admin');
    }
}
