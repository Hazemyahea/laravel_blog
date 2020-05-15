@extends('layouts.admin-master')

@section('content')

    <h1 class="text-center create_h ">Edit Post Section</h1>

    @if(Session::has('success'))
        <div class="alert alert-success container text-center">{{Session::get('success')}} </div>
    @endif



    <div class="row">
        <div class="col col-lg-4">
            <img class="img-fluid rounded " src="{{asset('images')}}/{{$post->photo ? $post->photo : 'place.PNG'}}">
        </div>
        <div class="col col-lg-8">
            {!! Form::model($post,['method' => 'PATCH','action'=>['PostsController@update', $post->id],'files'=>true]) !!}


            <div class="form-group">
                {{Form::label('title', 'Title : ')}}
                {{Form::text('title',null,['class'=>'form-control'])}}
            </div>
            @error('title')
            <div class="alert alert-danger text-center"> {{$message}}</div>
            @enderror

            <div class="form-group">
                {{Form::label('body', 'Body : ')}}
                <textarea class="form-control" name="body" rows="6">
{{$post->body}}
                </textarea>
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
            {{Form::submit('Update',['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>
    </div>


@endsection
