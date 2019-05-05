@extends('layouts.app')

@section('content')

<div class="container pt-4">

    <h1>Edit Post</h1>
    
    {!! Form::open(['action'=> ['PostsController@update', $post->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!} <!-- Postcontroller@store actionini da postu goruntulemek icin kullandik.-->
        <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('city','City')}}
            {{Form::text('city',$post->city,['class'=>'form-control','placeholder'=>'Şehir'])}}
            </div>
            <div class="form-group">
                {{Form::label('trip_day','Trip Day')}}
                {{Form::text('trip_day',$post->trip_day,['class'=>'form-control','placeholder'=>'Geziniz kaç gün sürdü ?'])}}
                </div>
                <div class="form-group">
                    {{Form::label('trip_fee','Trip Fee')}}
                    {{Form::text('trip_fee',$post->trip_fee,['class'=>'form-control','placeholder'=>'Ortalama ne kadar harcadınız?'])}}
                    </div>
                
                    <div class="form-group">
                        {{Form::label('trip_type','Trip Type')}}
                        {{Form::text('trip_type',$post->trip_type,['class'=>'form-control','placeholder'=>'Ne tür bir geziydi?'])}}
                        </div> 
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body Text'])}}
            </div>
            <div class="form-group" placeholder="Resim Ekle">
            
                    {{Form::label('file','Dosya Ekle')}}
                    {{Form::file('cover_image')}}
                
                
                </div>    
            {{Form::submit('submit'),['class'=>'btn btn-primary']}}
            {{Form::hidden('_method','PUT')}} <!-- Edit icin PUT methodunu kullan.-->
    {!! Form::close() !!} <!--form oluşturma-->
</div>
    @endsection
