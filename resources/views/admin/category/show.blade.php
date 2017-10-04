@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Category</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>id: {{ $category->id }}</h3>
                    <h3>Name: {{ $category->title }}</h3>
                    <h3>Slug: {{ $category->slug }}</h3>
                </div>
                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horisontal">
                            <dt>Created at:</dt>
                            <dd>{{ date('M j,Y', strtotime($category->created_at ))}}</dd>
                        </dl>
                        <dl class="dl-horisontal">
                            <dt>Last updated:</dt>
                            <dd>{{ date('M j,Y', strtotime($category->updated_at ))}}</dd>
                        </dl>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ action('Admin\CategoryController@edit', $category->id) }}" class="btn btn-default">Edit</a>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::model($category,['method' => 'DELETE','action' => ['Admin\CategoryController@destroy',$category->id],'style'=>'display:inline']) !!}

                                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection