@extends('layouts.home-master')

    <div class="card my-4 container text-center">
        <h4 class="card-header">{{$user->name}}</h4>

        <div class="card-body">
            <img class="img-fluid img-thumbnail" width="150" src="{{asset('images')}}/{{$post->user->photo ? $post->user->photo : 'man.PNG'}}">
            <br>
            <br>
            <h5 class="text-uppercase">{{$user->roles->name}}</h5>
        </div>
    </div>




@section('content')

<!-- Navigation -->

<!-- Page Content -->




        <!-- Post Content Column -->
        <div class="col-lg-12 text-center">

            <!-- Title -->
            <h1 class="mt-4">{{$post->title}}</h1>
                        <span class="btn-success like">{{count($post->likes)}} Liks</span>
            <!-- Author -->


            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{asset('images')}}/{{$post->photo ? $post->photo : 'place.PNG'}}" alt="">

            <hr>

            <!-- Post Content -->

            <p>{{$post->body}}</p>
            <br>
            {!! Form::open(['method'=>'POST','action'=>'LikesController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <input type="submit" value="Like" class="btn btn-primary" onclick="this.form.submit(); this.disabled = true; this.value = 'Thanks For Support';">

            {!! Form::close() !!}
            <hr>

            </div>


<div class="card my-4 container text-center">

    <br>
@if(Session::has('Success'))
    <div class="alert alert-success">{{Session::get('Success')}}</div>
    @endif

    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
        {!! Form::open(['method'=>'POST','action'=>'LikesController@make']) !!}

        <div class="form-group">
            {{Form::label('body', 'Body : ')}}
            <textarea class="form-control" name="body" rows="6"></textarea>
        </div>




            <input type="hidden" name="post_id" value="{{$post->id}}">
        {{Form::submit('Create Comment',['class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
    </div>
</div>

<!-- Single Comment -->

@if(count($comments) > 0)
    @foreach($comments as $comment)
        <div class="col-lg-12 ">
<div class="media mb-4  padding">
    <img class="d-flex mr-3 rounded-circle" width="100" src="{{asset('images')}}/{{$comment->user->photo ? $comment->user->photo : 'man.PNG'}}" alt="">
    <div class="media-body">
        <h5 class="mt-0">{{$comment->user->name}}</h5>
        <h6 style="color: darkmagenta">{{$comment->created_at->diffForHumans()}}</h6>
        {{$comment->body}}
    </div>
</div>
        </div>

    @endforeach
@else
    <h3 class="alert alert-dark">There are No Comments Yet .. Dont Worry They Will Comming </h3>
    @endif
<!-- Comment with nested comments -->


</div>


    <br>
    <br>

@endsection



