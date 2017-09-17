@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => 'admin/post/store', 'files' => true]) !!}
                    {{ Form::label('title', 'Заголовок') }}
                    {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '150')) }}

                {{ Form::label('desc', 'Description') }}
                {{ Form::textarea('desc', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '250')) }}


                {{ Form::label('contant', 'Contant') }}
                {{ Form::textarea('contant', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '250')) }}
                <div class="col-md-3">
                    {{ Form::label('tags', 'Tags:') }}
                    <select class="js-example-basic-multiple" name="tags[]" multiple="multiple" style="width: 100%;">
                        <option value="AL">Alabama</option>
                        ...
                        <option value="WY">Wyoming</option>
                    </select>
                </div>
                <div class="col-md-3">

                    {{ Form::label('category_id', 'Category:') }}
                    <select class="form-control" name="category_id">
                        <option value="Al">Alabama</option>

                    </select>
                </div>
                <div class="col-md-3">
                    {{ Form::label('slug', 'Slug:') }}
                    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100')) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('img', 'Images:') }}
                    <input type="file" name="img[]"  multiple="multiple" >
                </div>
                {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 80px;')) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection