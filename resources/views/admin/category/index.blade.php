@extends('layouts.admin-master')

@section('content')

    <h1 class="mt-4">Category</h1>
    <hr>
    <h3 class="mt-4">Add Category</h3>

    <div class="col col-lg-6">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}} </div>
        @endif
        {!! Form::open(['method'=>'POST','action'=>'CategortiesController@store']) !!}
        <div class="form-group">
            {{Form::label('name', ' Name : ')}}
            {{Form::text('name', null,['class'=>'form-control'])}}
        </div>
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        {{Form::submit('Add Category',['class'=>'btn btn-info'])}}
        {!! Form::close() !!}
    </div>
    <br>
    @if($categories->count() > 0)

        <div class="row">
            <div class="col col-lg-12 col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('category.edit',$category->id)}}"><button class="btn btn-primary">Update</button></a>
                            </td>
                            <td>

                                {!! Form::open(['method' => 'DELETE','action'=>['CategortiesController@destroy', $category->id],'files'=>true]) !!}

                                {{Form::submit('delete',['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                @else
                    <h2 class="text-center">No Categories Found</h2>

                @endif


            </div>
        </div>

@endsection
