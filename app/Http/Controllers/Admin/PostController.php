<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModels\Post;

class PostController extends Controller
{
    public function index () {
        return view('admin.post.index');
    }

    public function create () {
        return view('admin.post.create');
    }

    public function store (Request $request) {
      $request->validate ([
        'title' => 'required|unique:posts|max:255',
        'desc' => 'required',
      ]);
      $allData = $request->all();
      $arr = []; //массив для добавления файлов
      if($request->file('img')) {
          foreach ($allData['img'] as $image) {
              //сохранение файлов в папке на сервере /storage/images и присвоение им уникального имени
              $filename = $image->store('images');
              //сохрание файлов в массиве
              $arr[] = $filename;
          }
      }
      //преобразование массива файлов в строку для сохраннения в БД
      $images = implode(' ', $arr);
      //передача данных в столбец "img"
      $allReq['img'] = $images;
      //сохранение данных в БД
      Post::create($allData);
      //редирект на индексную страницу
      return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
