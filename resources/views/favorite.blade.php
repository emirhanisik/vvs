
    
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
            <input 
                type="text" 
                name="search"
                class="form-control where-to-go" 
                placeholder="Ne arıyorsun?"
            >
            <button class="search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <hr />

    <div class="container">
        <div class="col-12 text-right">
            <a href="/favorites/create" class="btn btn-outline-success">
                <i class="fas fa-pen mr-2"></i>
                favorite Oluştur
            </a>
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