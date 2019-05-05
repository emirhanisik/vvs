@extends('layouts.app')
{{-- HERO SECTION --}}
@section('content')
    <div class="hero py-5 d-flex flex-column align-items-center justify-content-center">
        <h1 class="display-1 text-center">Keşfet ve Anlat</h1>
        <p>Veni Vidi Scripsi Online Paylaşım Platformu</p>
        <div>
            <div class="form-group p-0 m-0 mt-4">
                <input 
                    type="text" 
                    class="form-control where-to-go" 
                    placeholder="Nereye gitmek istersin?"
                >
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, ducimus?
                            </p>
                            <a href="#" class="btn btn-primary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card categories-card">
                        <img src="../../img/cat-family.jpg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">
                                Arkadaş Gezisi
                            </h5>
                            <p class="card-comment">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, deserunt.
                            </p>
                            <a href="#" class="btn btn-primary">
                                İncele
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
