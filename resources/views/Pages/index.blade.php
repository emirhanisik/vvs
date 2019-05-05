@extends('layouts.app')
{{-- HERO SECTION --}}
@section('content')
    <section class="hero py-5 d-flex flex-column align-items-center justify-content-center">
        <h1 class="display-1 text-center">Keşfet ve Anlat</h1>
        <p>Veni Vidi Scripsi Online Paylaşım Platformu</p>
{{--         <div>
            <a 
                class="btn btn-primary" 
                href="/login" 
                role="button"
            >
                Giriş Yap
            </a>
            <a 
                class="btn btn-success" 
                href="/register" 
                role="button"
            >
                Kayıt Ol
            </a>
        </div> --}}
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
    </section>
    <div class="jumbotron text-center">
        <h1 class="display-1">Kategoriler</h1>
    </div>
@endsection
