@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Category</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h3>id: {{ $tag->id }}</h3>
                    <h3>Name: {{ $tag->title }}</h3>
                </div>
                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horisontal">
                            <dt>Created at:</dt>
                            <dd>{{ date('M j,Y', strtotime($tag->created_at ))}}</dd>
                        </dl>
                        <dl class="dl-horisontal">
                            <dt>Last updated:</dt>
                            <dd>{{ date('M j,Y', strtotime($tag->updated_at ))}}</dd>
                        </dl>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ action('Admin\TagController@edit', $tag->id) }}" class="btn btn-default btn-block">Edit</a>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::model($tag,['method' => 'DELETE','action' => ['Admin\TagController@destroy',$tag->id],'style'=>'display:inline']) !!}

                                    <button type="submit" style="display: inline;" class="btn btn-danger btn-block">Delete</button>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection