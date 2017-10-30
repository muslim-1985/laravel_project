<div class="container comment-child" style="display: none;">
    <div class="row">
        <div class="col-md-12">
                {!! Form::open(['route'=>['comment.store',$post->id],'class'=>'form-comment','style'=>'margin-left:30px; width:350px;']) !!}
                {{--формируем скрытое поле для сохранения id родительского для сохранения в поле parent_id --}}
                {{ Form::hidden('parent_id', $comment->id,['class'=>'form-control']) }}
                {{ Form::label('title', 'Ваше имя') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}
                {{ Form::label('email', 'Ваш e-mail') }}
                {{ Form::email('email', null, array('class' => 'form-control', 'required' => '')) }}
                {{ Form::label('content', 'Ваш комментарий') }}
                {{ Form::textarea('content', null, array('class' => 'form-control', 'required' => '')) }}

                <div class="col-md-2">
                    {{ Form::submit('Ответить', ['class' => 'btn btn-success','style'=>'margin-top:20px'])}}
                </div>

                {!! Form::close() !!}
        </div>
    </div>
</div>