@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Comments</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h4>id: {{ $comment->id }}</h4>
                    <h4>Name: {{ $comment->title }}</h4>
                    <p>Text: {{ $comment->content }}</p>
                </div>
                <div class="col-md-4">
                    <div class="well">
                        <dl class="dl-horisontal">
                            <dt>Created at:</dt>
                            <dd>{{ date('M j,Y', strtotime($comment->created_at ))}}</dd>
                        </dl>
                        <dl class="dl-horisontal">
                            <dt>Last updated:</dt>
                            <dd>{{ date('M j,Y', strtotime($comment->updated_at ))}}</dd>
                        </dl>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ route('admin.comment.edit',$comment->id) }}" class="btn btn-default btn-block">Edit</a>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::model($comment,['method' => 'DELETE','route' => ['admin.destroy.comment',$comment->id],'style'=>'display:inline']) !!}

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