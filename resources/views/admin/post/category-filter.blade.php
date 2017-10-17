@extends('admin/layouts/main')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>View Categories Posts</h1>
                    <a href="{{ action('Admin\PostController@create') }}" class="btn btn-default">Create Post</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>category</th>
                            <th>description</th>
                            <th>tag</th>
                            <th>slug</th>
                            <th>images</th>
                            <th>created at</th>
                            </thead>
                            <tbody>
                            @foreach($category->posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <strong>{{ $category->title }}</strong>
                                    </td>
                                    <td>{{ $post->desc }}</td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            {{ $tag->title }}
                                        @endforeach
                                    </td>
                                    <td>{{ $post->slug }}</td>
                                    <td>
                                        @foreach(explode(' ', $post->img) as $image)
                                            <img src="{{asset("images/$image" )}}" alt="No image" style="width: 50px; height: 50px;">
                                        @endforeach
                                    </td>
                                    <td>{{ date('M j,Y', strtotime($post->created_at ))}}</td>
                                    <td>
                                        <a href="{{ action('Admin\PostController@edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\PostController@destroy',$post->id],'style'=>'display:inline']) !!}

                                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>

                                        {!! Form::close() !!}
                                        <a href="{{ action('Admin\PostController@show', $post->id) }}" class="btn btn-success btn-sm">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection