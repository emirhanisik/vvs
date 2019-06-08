@extends('layouts.app')
{{-- HERO SECTION --}}
@section('content')
    <div class="hero py-5 d-flex flex-column align-items-center justify-content-center">
        <h1 class="display-1 text-center">Veni Vidi Scripsi</h1>
        <p>Online Paylaşım Platformu</p>
        <div>
            <form method="POST" action="{{url("/search")}}">
                {{ csrf_field() }}
        
            <div class="form-group p-0 m-0 mt-4">
                <input 
                    type="text"
                    name="search" 
                    class="form-control where-to-go" 
                    placeholder="Nereye gitmek istersin?"
                >
                <button class="search-btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <section class="section video bg--orange">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="section-heading text-right fg--white">
                        En önemli anlarınızı paylaşın
                    </h1>
                    <p class="text-right fg--white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum quia perspiciatis voluptatibus, tempora aspernatur nesciunt ea odio doloribus amet nihil, error et eos rerum labore, corrupti voluptatem vel accusamus unde!</p>
                </div>
                <div class="col-12 col-md-6">
                    <iframe class="shadow" width="100%" height="315" src="https://www.youtube.com/embed/RcmrbNRK-jY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="section categories text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="section-heading">
                        Kategoriler
                    </h1>
                </div>
                <div class="col-4">
                    <div class="card categories-card">
                        <img src="../../img/cat-family.jpg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">
                                Aile Gezisi
                            </h5>
                            <p class="card-comment">
                                Aileyle gidilebilecek en güzel geziler.
                            </p>
                            <a href="category/family" class="btn btn-secondary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card categories-card">
                        <img src="../../img/ark.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">
                                Arkadaş Gezisi
                            </h5>
                            <p class="card-comment">
                                Arkadaşlarınla yapabileceğin eğlenceli tatil önerileri.
                            </p>
                            <a href="category/friend" class="btn btn-secondary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card categories-card">
                        <img src="../../img/chrs.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">
                                Yılbaşı Gezisi
                            </h5>
                            <p class="card-comment">
                                Yeni yıla eğlenerek girmek isteyenler için en güzel fikirler.
                            </p>
                            <a href="category/newyear" class="btn btn-secondary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card categories-card">
                        <img src="../../img/sanat.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">
                                Kültür / Sanat
                            </h5>
                            <p class="card-comment">
                                Kültür ve sanata ait tüm geziler.
                            </p>
                            <a href="category/culture" class="btn btn-secondary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card categories-card">
                        <img src="../../img/snow.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">
                                Kar Tatili
                            </h5>
                            <p class="card-comment">
                                Kar tatilini özleyenlere.
                            </p>
                            <a href="category/semester" class="btn btn-secondary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card categories-card">
                        <img src="../../img/yazzz.jpeg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">
                                Yaz Tatili
                            </h5>
                            <p class="card-comment">
                                Yazın sıcağını nerede yaşamak isterseniz.
                            </p>
                            <a href="category/summer" class="btn btn-secondary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
                <section class="section categories text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="section-heading">
                                        Bölgeler
                                    </h1>
                                </div>
                                <div class="col-4">
                                    <div class="card categories-card">
                                        <img src="../../img/cat-family.jpg" class="card-img-top" alt="image">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Asya
                                            </h5>
                                            <p class="card-comment">
                                               Asya'yı keşfet <br>
                                               Uzak Doğu'ya yolculuk.
                                            </p>
                                            <a href="#" class="btn btn-secondary">
                                                İncele
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card categories-card">
                                        <img src="../../img/ark.jpeg" class="card-img-top" alt="image">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Avrupa
                                            </h5>
                                            <p class="card-comment">
                                                Avrupa yapabileceğin tatil önerilerini kaçırma.
                                            </p>
                                            <a href="#" class="btn btn-secondary">
                                                İncele
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card categories-card">
                                        <img src="../../img/chrs.jpeg" class="card-img-top" alt="image">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Güney Amerika
                                            </h5>
                                            <p class="card-comment">
                                               Tarih,doğa,eğlence <br>
                                               Güney Amerika keşfedilmeyi Bekliyor.
                                            </p>
                                            <a href="#" class="btn btn-secondary">
                                                İncele
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card categories-card">
                                        <img src="../../img/sanat.jpeg" class="card-img-top" alt="image">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Kuzey Amerika
                                            </h5>
                                            <p class="card-comment">
                                                Macera dolu Amerika.
                                            </p>
                                            <a href="#" class="btn btn-secondary">
                                                İncele
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card categories-card">
                                        <img src="../../img/snow.jpeg" class="card-img-top" alt="image">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Afrika
                                            </h5>
                                            <p class="card-comment">
                                                Doğa ve tatil iç içe. 
                                            </p>
                                            <a href="#" class="btn btn-secondary">
                                                İncele
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card categories-card">
                                        <img src="../../img/yazzz.jpeg" class="card-img-top" alt="image">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Türkiye
                                            </h5>
                                            <p class="card-comment">
                                                Yazın sıcağını nerede yaşamak isterseniz.
                                            </p>
                                            <a href="#" class="btn btn-secondary">
                                                İncele
                                            </a>
                                        </div>
                                    </div>
                                </div>

           
           
            </div>
        </div>
    </section>
@endsection
