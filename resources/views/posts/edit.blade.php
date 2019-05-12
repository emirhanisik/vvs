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

                <div class="col-12">
                    <h3>Gezi Resimlerinizi Ekleyin</h3>
                </div>
    
                <div class="form-group col-12 col-md-6">
                    <label>Görsel 1</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{Form::file('image1', ['class'=>'custom-file-input'])}}
                            {{Form::label('file', 'Dosya Ekle', ['class'=>'custom-file-label'])}}
                        </div>
                    </div>
                </div>
    
                <div class="form-group col-12 col-md-6">
                    <label>Görsel 2</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{Form::file('image2', ['class'=>'custom-file-input'])}}
                            {{Form::label('file', 'Dosya Ekle', ['class'=>'custom-file-label'])}}
                        </div>
                    </div>
                </div>
    
                <div class="form-group col-12 col-md-6">
                    <label>Görsel 3</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{Form::file('image3', ['class'=>'custom-file-input'])}}
                            {{Form::label('file', 'Dosya Ekle', ['class'=>'custom-file-label'])}}
                        </div>
                    </div>
                </div>
    
                <div class="form-group col-12 col-md-6">
                    <label>Görsel 4</label>
                    <div class="input-group">
                        <div class="custom-file">
                            {{Form::file('image4', ['class'=>'custom-file-input'])}}
                            {{Form::label('file', 'Dosya Ekle', ['class'=>'custom-file-label'])}}
                        </div>
                    </div>
                </div>
            {{Form::submit('submit'),['class'=>'btn btn-primary']}}
            {{Form::hidden('_method','PUT')}} <!-- Edit icin PUT methodunu kullan.-->
    {!! Form::close() !!} <!--form oluşturma-->
</div>
    @endsection
