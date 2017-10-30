@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Comments</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>author</th>
                            <th>content</th>
                            <th>post name</th>
                            <th>created at</th>
                            <th>published</th>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <th>{{ $comment->id }}</th>
                                    <td>
                                        <ul>
                                            <li>
                                                <small>name:</small>
                                                <a href="{{ route('comment.admin.filter',$comment->title) }}">{{ $comment->title }}</a>
                                            </li>
                                            <li><small>e-mail:</small> {{ $comment->email }}</li>
                                        </ul>
                                    </td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->posts->title }}</td>
                                    <td>{{ date('M j,Y', strtotime($comment->created_at ))}}</td>
                                    <td>
                                        @if($comment->approved == 1)
                                            опубликован
                                        @else
                                            не опубликован
                                        @endif
                                        {{-- обновление чекбокса, отправляем форму по созданному роуту и обновляем значение чекбокса --}}
                                        {!! Form::open(['method' => 'PATCH','route' => ['admin.comment.approved',$comment->id]]) !!}
                                            {!! Form::checkbox('approved',0,false) !!}
                                    </td>
                                    <td>

                                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Approved</button>

                                        {!! Form::close() !!}

                                        <a href="{{ route('admin.comment.edit', $comment->id) }}" class="btn btn-default btn-sm">Edit</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy.comment',$comment->id],'style'=>'display:inline']) !!}

                                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>

                                        {!! Form::close() !!}
                                        <a href="{{ route('admin.comment.show', $comment->id) }}" class="btn btn-success btn-sm">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-offset-5 col-md-6">
                    {{--вывод пагинации--}}
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection