<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModels\Category;

class CategoryController extends Controller
{
    public function index () {
        $categories = Category::all();
        return view('admin.category.index')->withCategories($categories);
    }

    public function create () {
        return view('admin.category.create');
    }

    public function store (Request $request) {
        $request->validate ([
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required',
        ]);

        //сохранение данных в БД
        Category::create($request->all());
        //редирект на индексную страницу
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->withCategory($category);
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
            'slug' => 'required',
        ]);
        Category::find($id)->update($request->all());
        return redirect('admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('admin/category');
    }
}
