@extends('layouts.admin-master')

@section('content')
    <h1 class="text-center create_h ">Edit Category Section</h1>
        <div class="row">
            <div class="col-lg-6">
                {!! Form::model($category,['method' => 'PATCH','action'=>['CategortiesController@update', $category->id],'files'=>true]) !!}


                <div class="form-group">
                    {{Form::label('name', 'User Name : ')}}
                    {{Form::text('name', null,['class'=>'form-control'])}}
                </div>
                @error('name')
                <div class="alert alert-danger text-center"> {{$message}}</div>
                @enderror
                {{Form::submit('Updaet',['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
            </div>

            <div class="col-lg-6">
                @if(Session::has('success'))
                    <br>
                    <div class="alert alert-success">{{Session::get('success')}} </div>
                @endif
            </div>

        </div>


@endsection
