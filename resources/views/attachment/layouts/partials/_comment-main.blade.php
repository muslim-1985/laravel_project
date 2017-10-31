<div class="container comment-parent">
    <div class="row">
        <div class="col-md-12">

                {!! Form::open(['class'=>'form-comment-parent','style'=>'margin-left:30px']) !!}

            <div class="col-md-6">
                {{ Form::label('title', 'Ваше имя') }}
                {{ Form::text('title', Session::get('name'), array('class' => 'title form-control', 'required' => '')) }}
            </div>
            <div class="col-md-6">
                {{ Form::label('email', 'Ваш e-mail') }}
                {{--выбираем данные из сессии чтобы пользователь не вводил их повторно--}}
                {{ Form::email('email', Session::get('mail'), array('class' => 'email form-control', 'required' => '')) }}
            </div>
                {{ Form::label('content', 'Ваш комментарий') }}
                {{ Form::textarea('content', null, array('class' => 'content form-control', 'required' => '')) }}
            {{--google reCaptcha--}}
            {!! NoCaptcha::display() !!}
                <div class="col-md-2">
                    {{ Form::submit('Создать Комментарий', ['class' => 'send btn btn-success','style'=>'margin-top:20px'])}}
                </div>

                {!! Form::close() !!}

        </div>
    </div>
</div>
