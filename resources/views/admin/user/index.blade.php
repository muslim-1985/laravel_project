@extends('admin/layouts/main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>View Users</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>name</th>
                            <th>e-mail</th>
                            <th>password</th>
                            <th>comments</th>
                            <th>created at</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>
                                        @foreach($user->comments as $comment)
                                            {{ $comment->title }}
                                        @endforeach
                                    </td>
                                    <td>{{ date('M j,Y', strtotime($user->created_at ))}}</td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy',$user->id],'style'=>'display:inline']) !!}

                                        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>

                                        {!! Form::close() !!}
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