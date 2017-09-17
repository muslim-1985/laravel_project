@extends('admin/layouts/main')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>View Posts</h1>
                    <a href="{{ action('Admin\PostController@create') }}" class="btn btn-default">Create Post</a>
                </div>
            </div>
        </div>
    @endsection