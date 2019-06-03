
    
    <?php 
    ?>

@extends('layouts.app')

@section('content')
<section class="section section-favorites">

    <h1 class="section-heading">
        Favoriler
    </h1>
    <div class="text-center mb-5">
        <div class="form-group d-inline-block flex-row p-0 m-0 mt-2 mx-auto">
        
        </div>
    </div>

    <hr />

    <div class="container">
        <div class="col-12 text-right">
           
        </div>
            <div class="mt-3">
                <div class="row">

                @if(count($favorites)>0)
                    @foreach ($favorites as $favorite)

                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <img 
                                        class="card-img-top img-cover"
                                        height="160"
                                        src="/storage/cover_images/{{$favorite->cover_image}}"
                                    >
                                
                                <div class="card-body text-truncate">
                                    <h3 class="card-title">
                                        <a href="/favorites/{{$favorite->id}}">
                                            {{$favorite->title}}
                                        </a>
                                    </h3>
                                    <p class="card-author mb-0">
                                        <i class="fas fa-user"></i>
                                        <a href="/profile/{{$favorite->user_id}}">
                                            {{$favorite->name}}
                                        </a> 
                                    </p>
                                    <small class="card-date">
                                        <i class="fas fa-clock"></i>
                                        {{$favorite->created_at}}
                                    </small>
                                </div>
                                <a href="/removeFavorite/{{$favorite->post_id}}" style="color:red">Favorilerden Kaldır</a>
                            </div>
                       
                        </div>                    
                    @endforeach
                @else
                        <p>No favorite found !</p>
                @endif
                
                
                @endsection
                </div> 
            </div>
        </div>
    </div>

        
        
</section>