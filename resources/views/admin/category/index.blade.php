@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Categories</h1>
                <a href="{{ action('Admin\CategoryController@create') }}" class="btn btn-default">Create Category</a>
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
                            @foreach($categories as $cat)
                                <tr>
                                    <th>{{ $cat->id }}</th>
                                    <td>{{ $cat->title }}</td>
                                    <td>{{ $cat->slug }}</td>
                                    <td>{{ date('M j,Y', strtotime($cat->created_at ))}}</td>
                                    <td>
                                        <a href="{{ action('Admin\CategoryController@edit', $cat->id) }}" class="btn btn-default btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','action' => ['Admin\CategoryController@destroy',$cat->id],'style'=>'display:inline']) !!}

                                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>

                                        {!! Form::close() !!}
                                        <a href="{{ action('Admin\CategoryController@show', $cat->id) }}" class="btn btn-success btn-sm">Show</a>
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