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
                    @if(Auth::user()->id == $post->user_id || Auth::user()->id == 1)
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
                Bu post {{$post->created_at}} {{$post->user->name}} tarafından yazıldı.
            </p>

        </div>

        <div>

           {{--  <h3>Geziyi Anlat</h3> --}}
            <p>{!!$post->body!!}</p>
        </div>
        <hr>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Gallery -->
<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="0"><img src="/storage/post_images/{{$post->image1}}" class="img-thumbnail my-3"></a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="1"><img src="/storage/post_images/{{$post->image2}}" class="img-thumbnail my-3"></a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="2"><img src="/storage/post_images/{{$post->image3}}" class="img-thumbnail my-3"></a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6" data-toggle="modal" data-target="#modal">
      <a href="#lightbox" data-slide-to="3"><img src="/storage/post_images/{{$post->image4}}" class="img-thumbnail my-3"></a>
    </div>
      
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Lightbox Gallery by Bootstrap 4" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="lightbox" class="carousel slide" data-ride="carousel" data-interval="5000" data-keyboard="true">
					<ol class="carousel-indicators">
						<li data-target="#lightbox" data-slide-to="0"></li>
						<li data-target="#lightbox" data-slide-to="1"></li>
						<li data-target="#lightbox" data-slide-to="2"></li>
						<li data-target="#lightbox" data-slide-to="3"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active"><img src="/storage/post_images/{{$post->image1}}" class="w-100"
							 alt=""></div>
						<div class="carousel-item"><img src="/storage/post_images/{{$post->image2}}" class="w-100"
							 alt=""></div>
						<div class="carousel-item"><img src="/storage/post_images/{{$post->image3}}" class="w-100"
							 alt=""></div>
						<div class="carousel-item"><img src="/storage/post_images/{{$post->image4}}" class="w-100"
							 alt=""></div>
					</div>
					<a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
					<a class="carousel-control-next" href="#lightbox" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
				</div>
			</div>
		</div>
	</div>
</div>
        <div class="row">
            <div class="col-12 col-md-4">
                
            </div>
            <div class="col-12 col-md-4">
                
            </div>
            <div class="col-12 col-md-4">
              
            </div>
            <div class="col-12 col-md-4">

            </div>
        </div>
        <br>
        <br>
        <div class="comment">
        <?php
                            //wishlist Code start
        if(Auth::check()){
         $favo = DB::table('favorites')->leftJoin('posts', 'favorites.post_id', '=', 'posts.id')->where('favorites.post_id', '=',$post->id)->get();
                            
         $count = App\Favorites::where(['post_id' => $post->id])->count();
        ?>
<?php if($count=="0"){?>
        {!!Form::open(['action' =>['PostsController@favorites', $post->id] ,'method'=>'GET', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'Favorites')}}
        {{Form::submit('Favorilere Ekle' , ['class' => 'btn btn-success'])}}
    {!!Form::close() !!}


    <?php } else {?>
        <p class="fg--green"> <a href="{{url('/favorite')}}">Favorilere</a> Eklendi </p>
      <?php }
        }?>
</div>
    <hr>
        <h3>Yorumlar</h3>
        @if(count($comments)>0)
            @foreach ($comments->all() as $comment)

            <div class="comment">
                <p class="commentator-name">{{$comment->name}}</p>
                <p class="commentator-comment">{{$comment->comment}}</p>

                @if(!Auth::guest())
                    @if(Auth::user()->id == $comment->user_id || Auth::user()->id == 1)
                    
                    <a class="commentator-remove" href="/removeComment/{{$comment->id}}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    @endif
                @endif

            </div>

            
            @endforeach
            <hr />
            <div class="share-post">
                <h3 class="mb-3">Paylaş</h3>
                <a class="fb" href="#">
                    <i class="fab fa-facebook"></i> Facebook
                </a>
                <a class="tw" href="#">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
                <a class="tmb" href="#">
                    <i class="fab fa-tumblr"></i> Tumblr
                </a>
            </div>

            

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