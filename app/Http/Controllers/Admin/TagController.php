<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModels\Tag;

class TagController extends Controller
{
    public function index () {
        $tags = Tag::all();
        return view('admin.tag.index')->withTags($tags);
    }

    public function create () {
        return view('admin.tag.create');
    }

    public function store (Request $request) {
        $request->validate ([
            'title' => 'required|unique:posts|max:255',
        ]);

        //сохранение данных в БД
        Tag::create($request->all());
        //редирект на индексную страницу
        return redirect('admin/tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit')->withTag($tag);
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
        ]);
        Tag::find($id)->update($request->all());
        return redirect('admin/tag');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        return redirect('admin/tag');
    }
}
