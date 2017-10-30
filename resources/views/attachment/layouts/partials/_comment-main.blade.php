<div class="container">
    <div class="row">
        <div class="col-md-12">

                {!! Form::open(['route'=>['comment.store',$post->id],'class'=>'form-comment','style'=>'margin-left:30px']) !!}

            <div class="col-md-6">
                {{ Form::label('title', 'Ваше имя') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}
            </div>
            <div class="col-md-6">
                {{ Form::label('email', 'Ваш e-mail') }}
                {{ Form::email('email', null, array('class' => 'form-control', 'required' => '')) }}
            </div>
                {{ Form::label('content', 'Ваш комментарий') }}
                {{ Form::textarea('content', null, array('class' => 'form-control', 'required' => '')) }}

            {!! NoCaptcha::display() !!}
                <div class="col-md-2">
                    {{ Form::submit('Создать Комментарий', ['class' => 'btn btn-success','style'=>'margin-top:20px'])}}
                </div>

                {!! Form::close() !!}

        </div>
    </div>
</div>