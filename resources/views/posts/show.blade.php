@extends('layouts.app')

@section('content')

<section class="section section-blog-post">

    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1 class="section-header text-left text-truncate m-0">
                {{$post->title}}
            </h1>
            <a href="/posts" class="btn btn-primary">
                <i 
                    class="fas fa-arrow-left mr-2"
                    style="font-size: 11px;"
                ></i>
                Geri Dön
            </a>
        </div>

        <hr />
        
        <img
            class="card img-cover"
            width="100%"
            height="300px"
            src="/storage/cover_images/{{$post->cover_image}}"
        >

        <div class="author-info mt-3">

            <p>Şehir: <span>{{$post->city}}</span></p>
            <p>Gün Sayısı: <span>{{$post->trip_day}}</span></p>
            <p>Harcanan Tutar: <span>{{$post->trip_fee}}</span></p>
            <p>Gezi Türü: <span>{{$post->trip_type}}</span></p>

        </div>

        <div>

            <h3>Geziyi Anlat</h3>
            <p>{!!$post->body!!}</p>
        </div>
        <hr>

        <div class="row">
            <div class="col-12 col-md-4">
                <img class="blog-image card img-cover"
                    src="/storage/post_images/{{$post->image1}}"
                />
            </div>
            <div class="col-12 col-md-4">
                <img class="blog-image card img-cover"
                    src="/storage/post_images/{{$post->image2}}"
                >
            </div>
            <div class="col-12 col-md-4">
                <img class="blog-image card img-cover"
                    src="/storage/post_images/{{$post->image3}}"
                >
            </div>
            <div class="col-12 col-md-4">
                <img class="blog-image card img-cover"
                    src="/storage/post_images/{{$post->image4}}"
                >
            </div>
        </div>

        <hr>
        <small>Bu blog {{$post->created_at}} {{$post->user->name}} tarafından yazıldı. </small>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                
                <br>
                <br>
                {!!Form::open(['action' =>['PostsController@destroy', $post->id] ,'method'=>'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'Delete')}}
                    {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}
                {!!Form::close() !!}
            @endif   
        @endif
        <hr>
        <hr>


        {!!Form::open(['action' =>['PostsController@favorites', $post->id] ,'method'=>'GET', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'Favorites')}}
        {{Form::submit('Favorites' , ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}
    <hr>
    <hr>
    <form method="POST" action='{{url("/comment/{$post->id}")}}'>

    {{csrf_field()}}
    <div class="form-group">

            <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" required autofocus></textarea>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-success btn-lg btn-block">Yorum Yap</button>

    </div>


    </form>


    <h3>YORUMLAR</h3>
    @if(count($comments)>0)
        @foreach ($comments->all() as $comment)
        <p>{{$comment->comment}}</p>
        <p>Yorumu Yapan: {{$comment->name}}</p>
        @endforeach

    @else
    <p>Bu gönderiye hiç yorum yapılmamıştır.</p>
    @endif
    @endsection

    </div>
</section>