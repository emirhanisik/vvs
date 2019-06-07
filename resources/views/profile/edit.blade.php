@extends('layouts.app')

@section('content')
<br>
<br>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
                <div class="panel-body">

    <h1>Hesap Düzenle</h1>
    {!! Form::open(['action' => ['UserController@update', Auth()->user()->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        
        <h3>Profil Bilgileri</h3>
        <div class = "form-group">
            {!! Form::text('email', Auth()->user()->email, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class = "form-group">
            {{Form::label('name', 'Isim')}}
            {{Form::text('name', Auth()->user()->name , ['class' => 'form-control', 'placeholder' => 'İsim'])}}
        </div>
        <h1>Şifre Değiştir</h1>
        <hr>
        <div class = "form-group">
            {{Form::password('password', ['id'=> 'password','class' => 'form-control', 'placeholder' => 'Sifre'])}}
    </div>

    <div class = "form-group">
        {{Form::password('confirmation', ['id'=> 'confirmation','class' => 'form-control', 'placeholder' => 'Sifre Tekrar'])}}
    </div>
    <hr>
        <h3>Adress Bilgileri</h3>
        <div class = "form-group">
            {{Form::label('city', 'Şehir')}}
            {{Form::text('city', Auth()->user()->city , ['class' => 'form-control', 'placeholder' => 'Şehir'])}}
        </div>
        <div class = "form-group">
            {{Form::label('country', 'Ülke')}}
            {{Form::text('country', Auth()->user()->country , ['class' => 'form-control', 'placeholder' => 'Ülke'])}}
        </div>
        <div class = "form-group">
            {{Form::label('adress', 'Adres')}}
            {{Form::text('adress', Auth()->user()->adress , ['class' => 'form-control', 'placeholder' => 'Adres'])}}
        </div>
        
        <H3>Kişisel Bilgiler</H3>

        <div class = "form-group">
            {{Form::label('bio', 'Gezi Mottosu')}}
            {{Form::textarea('bio', Auth()->user()->bio , ['class' => 'form-control', 'placeholder' => 'Gezi Mottosu'])}}
        </div>

        <div class = "form-group">
            {{Form::label('gender', 'Cinsiyet')}}
            {{Form::text('gender', Auth()->user()->gender , ['class' => 'form-control', 'placeholder' => 'Cinsiyet'])}}
        </div>
        <div class="form-group">
                {{Form::label('profile_image', 'Profil Resmi')}}
                {{Form::file('profile_image')}}
        
            </div>
       
       

        {{Form::hidden('_method', 'PUT')}} 
        {{Form::hidden('id', Auth()->user()->id) }} 
        {{Form::submit('Kaydet', ['class'=> 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
    </div>
</div>
</div>

@endsection