@extends('layouts.app')

@section('content')
    <br>
    <br>
    <a href="/posts" class="btn btn-primary">Blog Yazılarına Git</a>
    <br>
    <br>
    <h1>{{$post->title}}</h1>
    <img style="width :100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br>
    <br>
    <div>

    <p>Şehir:{{$post->city}} </p>
    
    <br>
    <br>
    <p>Gün Sayısı:{{$post->trip_day}}</p>
    <br>
    <br>
    <p>Harcanan Tutar:{{$post->trip_fee}}
    </p>
    <br>
    <br>
    <p>Gezi Türü: {{$post->trip_type}}</p>
    <br>
    <br>


    </div>

    <br>
    <br>
    <div>

        <p>Geziyi Anlat</p>
        <br><br>
        {!!$post->body!!}
    </div>
    <hr>
    <img style="width :30%" src="/storage/post_images/{{$post->image1}}">
    <img style="width :30%" src="/storage/post_images/{{$post->image2}}">
    <img style="width :30%" src="/storage/post_images/{{$post->image3}}">
    <img style="width :30%" src="/storage/post_images/{{$post->image4}}">

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