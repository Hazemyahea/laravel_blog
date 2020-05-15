@extends('layouts.admin-master')

@section('content')

    <h1 class="mt-4">Users</h1>
    @if(Session::has('delete'))
        <div class="alert alert-success container text-center">{{Session::get('delete')}} </div>
    @endif
    @if($users->count() > 0)

        <div class="row">
            <div class="col col-lg-12 col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">photo</th>
                        <th scope="col">Role</th>
                        <th scope="col">created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td> <img width="100" src="{{asset('images')}}/{{$user->photo ? $user->photo : 'man.PNG'}}"> </td>
                            <td>{{$user->roles->name}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('users.edit',$user->id)}}"><button class="btn btn-primary">Update</button></a>
                            </td>
                            <td>

                                {!! Form::open(['method' => 'DELETE','action'=>['UserController@destroy', $user->id],'files'=>true]) !!}

                                {{Form::submit('delete',['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                @else
                    <h2 class="text-center">No users Found</h2>

                @endif

                <a href="{{route('users.create')}}"><button class="btn btn-danger">Add User</button></a>
            </div>
        </div>

@endsection
