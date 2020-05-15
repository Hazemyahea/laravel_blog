@extends('layouts.admin-master')

@section('content')

    <h1 class="mt-4">Posts</h1>
    @if(Session::has('success'))
        <div class="alert alert-success text-center">{{Session::get('success')}} </div>
    @endif
    @if($posts->count() > 0)

        <div class="row">
            <div class="col col-lg-12 col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">body</th>
                        <th scope="col">photo</th>
                        <th scope="col">category</th>
                        <th scope="col">Author</th>
                        <th scope="col">created at</th>
                        <th scope="col">Updated at</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{Str::limit($post->body,50)}}</td>

                            <td> <img width="100" src="{{asset('images')}}/{{$post->photo ? $post->photo : 'place.PNG'}}"> </td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('posts.edit',$post->id)}}"><button class="btn btn-primary">Update</button></a>
                            </td>
                            <td>

                                {!! Form::open(['method' => 'DELETE','action'=>['PostsController@destroy', $post->id],'files'=>true]) !!}

                                {{Form::submit('delete',['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                @else
                    <h2 class="text-center">No Posts Found</h2>

                @endif

                <a href="{{route('posts.create')}}"><button class="btn btn-danger">Creat Post </button></a>
            </div>
        </div>

@endsection
