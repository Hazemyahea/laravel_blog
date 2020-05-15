@extends('layouts.admin-master')

@section('content')

    <h1 class="text-center create_h ">Create Post Section</h1>


    <div class="container">
        {!! Form::open(['method'=>'POST','action'=>'PostsController@store','enctype' => 'multipart/form-data']) !!}


        <div class="form-group">
            {{Form::label('title', 'Title : ')}}
            {{Form::text('title',null,['class'=>'form-control'])}}
        </div>
        @error('title')
        <div class="alert alert-danger text-center"> {{$message}}</div>
        @enderror

        <div class="form-group">
            {{Form::label('body', 'Body : ')}}
            <textarea class="form-control" name="body" rows="6"></textarea>
        </div>
        @error('body')
        <div class="alert alert-danger text-center"> {{$message}}</div>
        @enderror
        <div class="form-group">
            {{Form::label('photo', 'Choose a pretty photo  : ')}}
            {{Form::file('photo',['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('category_id', 'Roles : ')}}
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @error('role_id')
        <div class="alert alert-danger text-center"> {{$message}}</div>
        @enderror

        {{Form::submit('Create',['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
    </div>
@endsection
