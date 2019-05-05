@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
{!! Form::open(['action'=> 'PostsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Başlık'])}}
    </div>

    <div class="form-group">
        {{Form::label('city','City')}}
        {{Form::text('city','',['class'=>'form-control','placeholder'=>'Şehir'])}}
        </div>
        <div class="form-group">
            {{Form::label('trip_day','Trip Day')}}
            {{Form::text('trip_day','',['class'=>'form-control','placeholder'=>'Geziniz kaç gün sürdü ?'])}}
            </div>
            <div class="form-group">
                {{Form::label('trip_fee','Trip Fee')}}
                {{Form::text('trip_fee','',['class'=>'form-control','placeholder'=>'Ortalama ne kadar harcadınız?'])}}
                </div>
             
                <div class="form-group">
                    {{Form::label('trip_type','Trip Type')}}
                    {{Form::text('trip_type','',['class'=>'form-control','placeholder'=>'Ne tür bir geziydi?'])}}
                    </div>   
    <div class="form-group">
        {{Form::label('body','Body')}}
        {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Yazmaya Başla..'])}}
        </div>

    <div class="form-group" placeholder="Resim Ekle">
        
        {{Form::label('file','Dosya Ekle')}}
        {{Form::file('cover_image')}}
    
    
    </div>    

    {{Form::submit('submit'),['class'=>'btn btn-primary']}}
    {!! Form::close() !!} <!--form oluşturma-->
@endsection