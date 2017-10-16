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
                            <th>title</th>
                            <th>content</th>
                            <th>user</th>
                            <th>created at</th>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <th>{{ $comment->id }}</th>
                                    <td>{{ $comment->title }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->admins->name }}</td>
                                    <td>{{ date('M j,Y', strtotime($comment->created_at ))}}</td>
                                    <td>
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
            </div>
        </div>
    </div>
@endsection