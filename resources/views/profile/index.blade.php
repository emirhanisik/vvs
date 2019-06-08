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
                        src="/storage/profile_images/{{$user->profile_image}}"
                    />
                    <div class="ml-4">
                        <h2>
                            {{$user->name}} {{$user->surname}}
                        </h2> 
                          <p class="mb-2">
                            <i class="fas fa-users fg--green"> </i>
                                <span>
                                @if (count($posts) >= 0 && count($posts)<= 6)
                                    <?php echo 'Bronz Üye'?>
                                        @endif

                                @if (count($posts) >= 7 && count($posts)<= 14)
                                    <?php echo 'Gümüş Üye'?>
                                        @endif
                                    </span>
                                @if (count($posts) > 15)
                                    <?php echo 'Altın Üye'?>
                                        @endif
                                    </span>
                          
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-map-marker mr-2 fg--green"></i>
                            <span>
                                {{$user->city}}, {{$user->country}}
                            </span>
                        </p>
                        <p>
                            <i class="fas fa-envelope mr-2 fg--green"></i>
                            <a href="mailto:{{$user->email}}">
                                {{$user->email}}
                            </a>
                        </p>
                    </div>
                </div>

                <div>
                        {{$user->bio}}
                </div>

                <div>
                    {{-- ROZETLER --}}

                    @if(count($posts) >= 0)

                        <img title="Yeni Üye" src="https://img.icons8.com/color/48/000000/groups.png">

                    @endif
                    
                    @if (count($posts) >= 1)
                    
                        
                    <img title="İlk Paylaşım" src="https://img.icons8.com/color/48/000000/medal2.png">
                    @endif
                    
                    @if (count($posts) >= 5)
                    
                        <img title="Çırak Yazar" src="https://img.icons8.com/color/48/000000/corporal-cpl.png">
                    
                        <img title="Gezgin" src="https://img.icons8.com/color/48/000000/eiffel-tower.png">
                    @endif
                    
                    @if (count($posts) >= 7)
                    
                    <img title="Yerinde Durmayan" src="https://img.icons8.com/color/48/000000/worldwide-location.png">
                    
                    <img title="Usta Yazar" src="https://img.icons8.com/color/48/000000/sergeant-major-sgt.png">

                    @endif
                    
                @if (count($comments)>=1)

                    <img title="Meraklı" src="https://img.icons8.com/color/48/000000/speech-bubble-with-dots.png">

                @endif
                
                @if (count($comments)>=5)
                
                <img title="Eleştirmen" src="https://img.icons8.com/color/48/000000/critical-thinking.png">
                @endif

                {{-- /ROZETLER --}}
                </div>
            </div>
        </div>
    </div>
</div>

        Yazılan Blog Sayısı <?php echo count($posts)?>

        Yazilan Yorum Sayisi <?php echo count($comments)?>

<section class="section">
<div class="container">
    <div class="row">
        
            <div class="col-12">
                <h3 class="section-heading">
                    Yazdığınız Postlar
                </h3>
            </div>

                @if(count($posts)>0)
                            
                    @foreach ($posts as $post)
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <img 
                                    src="/storage/cover_images/{{$post->cover_image}}" 
                                    class="card-img-top"
                                    style="object-fit: cover; object-position: center" 
                                    width="100%" 
                                    height="200" 
                                    alt="image"
                                >
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

                @else 

                <p>Henüz post yazmadınız!</p>

                @endif 
            @endsection
        </div>
    </div>
</section>

    
</div>