@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => 'admin/tag/store']) !!}
                {{ Form::label('title', 'Название') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '150')) }}


                {{ Form::submit('Создать Тег', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 80px;')) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection