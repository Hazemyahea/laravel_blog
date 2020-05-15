
@extends('layouts.home-master')

@section('content')



    <div class="col-md-8 top">


            @foreach($posts as $post)
        <div class="card mb-4">
            <img class="card-img-top" src="{{asset('images')}}/{{$post->photo ? $post->photo : 'place.PNG'}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{Str::limit($post->body,50)}}</p>
                <a href="{{route('post',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              From  {{$post->created_at->diffForHumans()}}
                <a href="#">{{$post->user->name}}</a>
               | Categories : {{$post->category->name}}
            </div>
        </div>
            @endforeach



        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            {{$posts->links()}}
        </ul>

    </div>


@endsection


@section('cate')


    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($categories as $cate)
                        <li>
                            <a href="{{route('category',$cate->id)}}">{{$cate->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>

@endsection


