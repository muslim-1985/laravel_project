<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{-- проверка аутентифицированного пользователя --}}
            @if(Auth::guard('admin')->check())
                {!! Form::open(['route'=>['comment.store',$post->id]]) !!}
                {{ Form::label('title', 'Ваше имя') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}
                {{ Form::label('content', 'Ваш комментарий') }}
                {{ Form::textarea('content', null, array('class' => 'form-control', 'required' => '')) }}

                <div class="col-md-2">
                    {{ Form::submit('Создать Комментарий', ['class' => 'btn btn-success btn-lg btn-block',])}}
                </div>

                {!! Form::close() !!}
                @else
                    <h3>комментарии могут оставлять только зарегестрированные пользователи</h3>
                    <p><a href="{{ action('Auth\AdminController@ShowLoginForm') }}">Войти</a></p>
                @endif
        </div>
    </div>
</div>