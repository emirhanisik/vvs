@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <br> 
    
<form method="POST" action="{{url("/search")}}">
    {{ csrf_field() }}



    <div class="input-group">
        <input type="text" name="search" class="from-control" placeholder="Nereye gitmek istersin?">
        <br>
        <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Ara </button>
    
        </span>
    </div>

    <br>
    <br>


    <a href="/posts/create" class="btn btn-primary">Create Post</a>
    <br><br>
    @if(count($posts)>0)
        @foreach ($posts as $post)
                <hr>
                <hr>
            <div class="well well-lg">
                <div class="row">

                    <div class="col-md-4 col-sm-4">
                    <img style="width :100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>

                    <div class="col-md-4 col-sm-4">
                            <h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
                    <small> {{$post->created_at}} tarihinde <a href="/profile/{{$post->user->id}}"> {{$post->user->name}}</a> tarafından oluşturuldu.</small>
                    </div>
                </div>
             </div>    
        @endforeach
        {{$posts->links()}} <!--Pagination için koyduk!-->
    @else
            <p>No post found !</p>
    @endif
    
       
    @endsection