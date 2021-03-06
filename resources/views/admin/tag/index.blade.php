@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Tags</h1>
                <a href="{{ action('Admin\TagController@create') }}" class="btn btn-default">Create Tag</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>slug</th>
                            <th>created at</th>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <th>{{ $tag->id }}</th>
                                    <td>
                                        <a href="{{ route('tag.filter',$tag->id) }}">{{ $tag->title }}</a>
                                        <small> post({{ $tag->posts()->count() }})</small>
                                    </td>
                                    <td>{{ date('M j,Y', strtotime($tag->created_at ))}}</td>
                                    <td>
                                        <a href="{{ action('Admin\TagController@edit', $tag->id) }}" class="btn btn-default btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\TagController@destroy',$tag->id],'style'=>'display:inline']) !!}

                                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>

                                        {!! Form::close() !!}
                                        <a href="{{ action('Admin\TagController@show', $tag->id) }}" class="btn btn-success btn-sm">Show</a>
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