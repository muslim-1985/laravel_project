@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Category</h1>
            </div>
            <div class="row">
                {!! Form::model($category,['method' => 'PATCH', 'action' => ['Admin\CategoryController@update',$category->id]]) !!}
                <div class="col-md-8">
                    {{ Form::label('title', 'Название') }}
                    {!! Form::text('title',null, ['class'=>'form-control']) !!}
                    {{ Form::label('slug', 'Cлаг') }}
                    {!! Form::text('slug',null, ['class'=>'form-control']) !!}
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
                                <a href="{{ action('Admin\CategoryController@show', $category->id) }}" class="btn btn-default btn-block">Cansel</a>
                            </div>
                            <div class="col-sm-6">
                                {!! Form::submit('Save changes', ['class'=>'btn btn-success btn-block']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection