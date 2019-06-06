@extends('layouts.app')

@section('content')

<section class="section section-blog-post">

    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <h1 class="section-header text-left text-truncate m-0">
                {{$post->title}}
            </h1>   
            <div class="d-flex flex-row">
                @if(!Auth::guest())
                    @if(Auth::user()->id == $post->user_id)
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-success mr-2">
                            {{-- <i 
                                class="fas fa-pen mr-2"
                                style="font-size: 11px;"
                            ></i> --}}
                            Düzenle
                        </a>
                        
                        {!!Form::open(['action' =>['PostsController@destroy', $post->id] ,'method'=>'POST', 'class' => 'mb-0'])!!}
                            {{Form::hidden('_method', 'Delete')}}
                            {{Form::submit('Sil' , ['class' => 'btn btn-danger mr-2'])}}
                        {!!Form::close() !!}
                    @endif   
                @endif
            
                <a href="/posts" class="btn btn-primary">
                    {{-- <i 
                        class="fas fa-arrow-left mr-2"
                        style="font-size: 11px;"
                    ></i> --}}
                    Geri Dön
            </a>
            </div>
        </div>

        <hr />
        
        <img
            class="card img-cover"
            width="100%"
            height="300px"
            src="/storage/cover_images/{{$post->cover_image}}"
        >

        <div class="author-info mt-3">
            
            <div class="d-flex flex-row align-items-center">
                <p>
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>{{$post->city['CityName']}}</span> 
                    <span>{{$post->city['CountryName']}}</span> 

                    
                <p>
                    <i class="fas fa-clock mr-2"></i>
                    <span>{{$post->trip_day}}</span></p>
                <p>
                    <i class="fas fa-money-bill-alt mr-2"></i>
                    <span>{{$post->trip_fee}}</span>
                </p>
                <p>
                    <i class="fas fa-suitcase-rolling"></i>
                    <span>{{$post->category['name']}}</span>  
                </p>
            </div>
            <p>
                Bu blog {{$post->created_at}} {{$post->user->name}} tarafından yazıldı.
            </p>

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

        <div class="d-flex flex-row align-items-center justify-content-end">
            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-success mr-2">
                        Düzenle
                    </a>
                    
                    {!!Form::open(['action' =>['PostsController@destroy', $post->id] ,'method'=>'POST', 'class' => 'mb-0'])!!}
                        {{Form::hidden('_method', 'Delete')}}
                        {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}
                    {!!Form::close() !!}
                @endif   
            @endif
        </div>

        <hr>
        <?php
                            //wishlist Code start
        if(Auth::check()){
         $favo = DB::table('favorites')->leftJoin('posts', 'favorites.post_id', '=', 'posts.id')->where('favorites.post_id', '=',$post->id)->get();
                            
         $count = App\Favorites::where(['post_id' => $post->id])->count();
        ?>
<?php if($count=="0"){?>
        {!!Form::open(['action' =>['PostsController@favorites', $post->id] ,'method'=>'GET', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'Favorites')}}
        {{Form::submit('Favorites' , ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}


    <?php } else {?>
        <h5 style="color:green"> <a href="{{url('/favorite')}}">Favorilere</a> Eklendi </h5>
      <?php }
        }?>

    <hr>
    <hr>
        <h3>YORUMLAR</h3>
        @if(count($comments)>0)
            @foreach ($comments->all() as $comment)
            <p>{{$comment->comment}}</p>
            <p>Yorumu Yapan: {{$comment->name}}</p>
            @if(!Auth::guest())
            @if(Auth::user()->id == $comment->user_id)
            
            <a href="/removeComment/{{$comment->id}}" style="color:red">Yorumu Sil</a>
            @endif
            @endif
            @endforeach

        @else
        <p>Bu gönderiye hiç yorum yapılmamıştır.</p>
        @endif

    <hr>
    <form method="POST" action='{{url("/comment/{$post->id}")}}'>

    {{csrf_field()}}
    <div class="form-group">
        <textarea 
            class="form-control" 
            name="comment" 
            id="comment" 
            cols="30" 
            rows="3" 
            required 
        ></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block">Yorum Yap</button>
    </div>


    </form>

    @endsection

    </div>
</section>