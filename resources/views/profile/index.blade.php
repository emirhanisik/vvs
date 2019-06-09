@extends('layouts.app')

@section('content')

<section class="section container pt-4">
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <img 
                        class="profile-img img-cover mb-3" 
                        width="100%" 
                        src="/storage/profile_images/{{$user->profile_image}}"
                    />
                    <div class="text-center mb-2">
                        <h2>
                            {{$user->name}} {{$user->surname}}
                        </h2> 
                        <div class="d-flex flex-row align-items-center">
                            <p class="mb-0">
                                <i class="fas fa-users mr-1 fg--grey"> </i>
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
                            <p class="mb-0 ml-3">
                                <i class="fas fa-map-marker mr-1 fg--grey"></i>
                                <span>
                                    {{$user->city}}, {{$user->country}}
                                </span>
                            </p>
                            <p class="mb-0 ml-3">
                                <i class="fas fa-envelope mr-1 fg--grey"></i>
                                <a href="mailto:{{$user->email}}">
                                    {{$user->email}}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                
                <div class="profile-bio mx-auto text-center">
                        {{$user->bio}}
                </div>

                <div class="profile-info text-center my-3">
                    <p class="fg--dark mb-1">Yazılan Blog Sayısı: <span class="fg--blue"><?php echo count($posts)?></span></p>
                    <p class="fg--dark mb-0">Yazılan Yorum Sayısı: <span class="fg--blue"><?php echo count($comments)?></span></p>
                </div>

                <div class="profile-badges text-center">

                    <h4>
                        Kazanılan Rozetler
                    </h4>

                    <div>
                    {{-- ROZETLER --}}
                    <!--0 -->
                    @if(count($posts) >= 0)

                    <div>
                        <img title="Yeni Üye" src="https://img.icons8.com/color/48/000000/groups.png">
                        <span>Yeni Üye</span>
                    </div>

                    @endif
                    <!--1 -->
                    @if (count($posts) >= 1)
                    
                    <div>  
                        <img title="İlk Paylaşım" src="https://img.icons8.com/color/48/000000/medal2.png">
                        <span>İlk Paylaşım</span>
                    </div>
                    @endif
                    <!--5 -->
                    @if (count($posts) >= 5)

                    <div>
                        <img title="Çırak Yazar" src="https://img.icons8.com/color/48/000000/corporal-cpl.png">
                        <span>Çırak Yazar</span>
                    </div>
                    @endif
                    <!--5 -->
                    @if (count($posts) >= 5)

                    <div>
                        <img title="Gezgin" src="https://img.icons8.com/color/48/000000/eiffel-tower.png">
                        <span>Gezgin</span>
                    </div>
                    @endif
                    <!--7 -->
                    @if (count($posts) >= 7)

                    <div>
                    <img title="Yerinde Durmayan" src="https://img.icons8.com/color/48/000000/worldwide-location.png">
                    <span>Yerinde Durmayan</span>
                    </div>
                    <div>
                    <img title="Usta Yazar" src="https://img.icons8.com/color/48/000000/sergeant-major-sgt.png">
                    <span>Usta Yazar</span>
                    </div>
                    @endif
                    <!--1 -->
                    @if (count($comments)>=1)
                    <div>
                        <img title="Meraklı" src="https://img.icons8.com/color/48/000000/speech-bubble-with-dots.png">
                        <span>Meraklı</span>
                    </div>
                    @endif
                    <!--5 -->
                    @if (count($comments)>=5)
                    
                    <div>
                        <img title="Eleştirmen" src="https://img.icons8.com/color/48/000000/critical-thinking.png">
                        <span>Eleştirmen</span>
                    <div>
                    @endif

                    {{-- /ROZETLER --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

       

<section class="section">
<div class="container">
    <div class="row">
        
            <div class="col-12">
                <h3 class="section-heading">
                    Yazılan Bloglar
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
                                <h3 style="text-align:center" class="card-title">{{$post->title}}</h3>
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

                <p>Henüz blog yazısı yazmadınız!</p>

                @endif 
            @endsection
        </div>
    </div>
</section>

    
</div>