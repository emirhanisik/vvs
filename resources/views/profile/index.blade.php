@extends('layouts.app')

@section('content')

<div class="container pt-4">
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                
                <div class="d-flex flex-row">
                    <img 
                        class="profile-img img-cover" 
                        width="100%" 
                        src="/storage/profile_images/{{Auth::user()->profile_image}}"
                    />
                    <div class="ml-4">
                        <h2>
                            {{Auth::user()->name}} {{Auth::user()->surname}}
                        </h2>
                        <p class="mb-2">
                            <i class="fas fa-map-marker mr-2"></i>
                            <span>
                                {{Auth::user()->city}}, {{Auth::user()->country}}
                            </span>
                        </p>
                        <p>
                            <i class="fas fa-envelope mr-2"></i>
                            <a href="mailto:{{Auth::user()->email}}">
                                {{Auth::user()->email}}
                            </a>
                        </p>
                    </div>
                </div>

                <div>
                        {{Auth::user()->bio}}
                </div>

            </div>
        </div>
    </div>

    <section class="section col-12">

        <h3 class="section-heading">
            Yazdığınız Postlar
        </h3>

            @if(count($posts)>0)
            <table class="table table-striped">
                        
                @foreach ($posts as $post)
                    <div class="col-4">
                        <div class="card">
                            <img src="/storage/cover_images/{{$post->cover_image}}" class="card-img-top" alt="image">
                            <div class="card-body p-0">
                                <a 
                                    href="/posts/{{$post->id}}" 
                                    class="btn btn-secondary btn-block"
                                    style="border-top-left-radius: 0; border-top-right-radius: 0;"
                                >
                                    İncele
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach   
            </table>

            @else 

            <p>Henüz post yazmadınız!</p>

            @endif 
        @endsection
    </section>
</div>