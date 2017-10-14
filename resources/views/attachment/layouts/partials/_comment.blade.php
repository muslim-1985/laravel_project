<div class="container">
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>['comment.store',$post->id]]) !!}
            {{ Form::label('title', 'Ваше имя') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}
            {{ Form::label('content', 'Ваш комментарий') }}
            {{ Form::textarea('content', null, array('class' => 'form-control', 'required' => '')) }}

            <div class="col-md-2">
                {{ Form::submit('Создать Комментарий', ['class' => 'btn btn-success btn-lg btn-block',])}}
            </div>

{!! Form::close() !!}
</div>
</div>
</div>