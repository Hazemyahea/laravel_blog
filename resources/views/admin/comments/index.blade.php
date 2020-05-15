@extends('layouts.admin-master')

@section('content')

    <h1 class="mt-4">Posts</h1>
    @if(Session::has('done'))
        <div class="alert alert-success text-center">{{Session::get('done')}} </div>
    @endif
    @if($commetns->count() > 0)

        <div class="row">
            <div class="col col-lg-12 col-xs-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author</th>
                        <th scope="col">body</th>
                        <th scope="col">post</th>
                        <th scope="col">created at</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commetns as $commetn)
                        <tr>
                            <th scope="row">{{$commetn->id}}</th>
                            <td>{{$commetn->user->name}}</td>
                            <td>{{Str::limit($commetn->body,50)}}</td>
                            <td>{{$commetn->post->title}}</td>
                            <td>{{$commetn->created_at->diffForHumans()}}</td>
                            <td>

                                {!! Form::open(['method' => 'DELETE','action'=>['CommentController@destroy', $commetn->id],'files'=>true]) !!}

                                {{Form::submit('delete',['class'=>'btn btn-danger'])}}
                                {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

                @else
                    <h2 class="text-center">No Comment Found</h2>

                @endif

            </div>
        </div>

@endsection
