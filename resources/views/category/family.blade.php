@extends('layouts.app')

@section('content')
<section class="section section-posts">

    <h1 class="section-heading">
        Aile Gezisi
    </h1>
    
    <form method="POST" action="{{url("/search")}}">
        {{ csrf_field() }}

        {{-- Search Bar --}}
        <div class="text-center mb-5">
            <div 
                class="form-group d-inline-block flex-row p-0 m-0 mt-2 mx-auto"
            >
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
                    <a href="/posts/create" class="btn btn-outline-success">
                        <i class="fas fa-pen mr-2"></i>
                        Post Oluştur
                    </a>
                </div>
                <div class="mt-3">
                    <div class="row">

                    @if(count($posts)>0)
                        @foreach ($posts as $post)

                                <div class="col-12 col-md-4">
                                        <div class="card">
                                            <img 
                                                class="card-img-top img-cover"
                                                height="160"
                                                src="/storage/cover_images/{{$post->cover_image}}"
                                            >
                                        
                                        <div class="card-body text-truncate">
                                            <h3 class="card-title">
                                                <a href="/posts/{{$post->id}}">
                                                    {{$post->title}}
                                                </a>
                                            </h3>
                                            <p class="card-author mb-0">
                                                <i class="fas fa-user"></i>
                                                <a href="/profile/{{$post->user->id}}">
                                                    {{$post->user->name}}
                                                </a> 
                                            </p>
                                            <small class="card-date">
                                                <i class="fas fa-clock"></i>
                                                {{$post->created_at}}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                               
                        @endforeach
                        {{$posts->links()}} <!--Pagination için koyduk!-->
                    @else
                            <p>No post found !</p>
                    @endif
                    
                    
                    @endsection
                    </div> 
                </div>
            </div>
        </div>

        
        
</section>