@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => 'admin/category/store']) !!}
                {{ Form::label('title', 'Название') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '150')) }}

                {{ Form::label('slug', 'Слаг') }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '150')) }}

                {{ Form::submit('Создать Категорию', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 80px;')) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection