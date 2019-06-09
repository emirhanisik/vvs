@extends('layouts.app');

@section('content')

<section class="section">

    <h1 class="section-heading">Kategori Ekle</h1>

    <div class="container">
            <div class="row">
         
                <div class="col-12 col-md-6 offset-md-3">
                {!! Form::open(['action'=> 'CategoryController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!} 

                <div class="col-12">
                        <div class="form-group">
                                {{Form::label('name','Kategori Adı')}}
                                {{Form::text('name','',['class'=>'form-control','placeholder'=>''])}}
                        </div>
                </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success" style="width: 100px">
                        Kaydet
                </button> 
                <a href="/admin" class="btn btn-primary">
                    {{-- <i 
                        class="fas fa-arrow-left mr-2"
                        style="font-size: 11px;"
                    ></i> --}}
                    Geri Dön
                    </a>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection