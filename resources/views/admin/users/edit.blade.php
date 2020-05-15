@extends('layouts.admin-master')

@section('content')

    <h1 class="text-center create_h ">Add User Section</h1>

    @if(Session::has('success'))
        <div class="alert alert-success container text-center">{{Session::get('success')}} </div>
    @endif



        <div class="row">
            <div class="col col-lg-4">
                <img class="img-fluid rounded " src="{{asset('images')}}/{{$user->photo ? $user->photo : 'man.PNG'}}">
            </div>
            <div class="col col-lg-8">
                {!! Form::model($user,['method' => 'PATCH','action'=>['UserController@update', $user->id],'files'=>true]) !!}


                <div class="form-group">
                    {{Form::label('name', 'User Name : ')}}
                    {{Form::text('name', null,['class'=>'form-control'])}}
                </div>
                @error('name')
                <div class="alert alert-danger text-center"> {{$message}}</div>
                @enderror

                <div class="form-group">
                    {{Form::label('password', 'Password : ')}}
                    {{Form::text('password', null,['class'=>'form-control'])}}
                </div>
                @error('password')
                <div class="alert alert-danger text-center"> {{$message}}</div>
                @enderror
                <div class="form-group">
                    {{Form::label('email', 'Email : ')}}
                    {{Form::text('email', null,['class'=>'form-control'])}}
                </div>

                @error('email')
                <div class="alert alert-danger text-center"> {{$message}}</div>
                @enderror

                <div class="form-group">
                    {{Form::label('role_id', 'Roles : ')}}
                    <select name="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('role_id')
                <div class="alert alert-danger text-center"> {{$message}}</div>
                @enderror
                <div class="form-group">
                    {{Form::label('photo', 'Choose a pretty photo  : ')}}
                    {{Form::file('photo',['class'=>'form-control'])}}
                </div>

                {{Form::submit('Update',['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
            </div>
        </div>


@endsection
