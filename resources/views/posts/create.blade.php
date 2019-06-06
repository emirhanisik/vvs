@extends('layouts.app')

@section('content')

<section class="section">

    <h1 class="section-heading">Post Oluştur</h1>

    {!! Form::open(['action'=> 'PostsController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="container">

        <div class="row">

            <div class="form-group col-12 col-md-6">
                {{Form::label('title','Post Başlığı')}}
                {{Form::text('title','',['class'=>'form-control','placeholder'=>'Hollanda\'da 1 hafta'])}}
            </div>


            <div class="form-group  col-12 col-md-6">
                {{Form::label('category_id','Kategori')}}
                <select class="form-control" name="category_id" >

                    @foreach ($cat as $key=>$value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group  col-12 col-md-6">
                {{Form::label('trip_day','Tatil süresi (gün)')}}
                {{Form::number('trip_day','',['class'=>'form-control','placeholder'=>'7 gün'])}}
            </div>

            <div class="form-group  col-12 col-md-6">
                {{Form::label('trip_fee','Seyahat Tutarı')}}
                {{Form::text('trip_fee','',['class'=>'form-control','placeholder'=>'5.600,750 ₺'])}}
            </div>  

            <div class="form-group  col-12 col-md-6">
                {{Form::label('city','Şehir')}}
                <select class="form-control" name="city_id" >

                    @foreach ($city as $secret=>$newvalue)
                <option value="{{$newvalue->id}}">{{$newvalue->CityName}}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-12 col-md-6">
                <label>Kapak Resminizi Ekleyin</label>
                <div class="input-group">
                    <div class="custom-file">
                        {{Form::file('cover_image', ['class'=>'custom-file-input'])}}
                        {{Form::label('file', 'Dosya Ekle', ['class'=>'custom-file-label'])}}
                    </div>
                </div>
            </div>
            
            <div class="form-group col-12">
                {{Form::label('body','Makale')}}
                {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'','placeholder'=>'Yazmaya Başla..'])}}
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

            {{-- <div class="form-group col-md-6">
                
                {{Form::label('file','Dosya Ekle')}}
                {{Form::file('image1')}}
            
            </div> 

            <div class="form-group col-md-6">
                
                {{Form::label('file','Dosya Ekle')}}
                {{Form::file('image2')}}
            
            </div> 

            <div class="form-group col-md-6">
                
                {{Form::label('file','Dosya Ekle')}}
                {{Form::file('image3')}}
            
            </div> 

            <div class="form-group col-md-6">
                
                {{Form::label('file','Dosya Ekle')}}
                {{Form::file('image4')}}
            
            </div>  --}}

            <div class="col-12">
                {{-- {{Form::submit('Kaydet'),['class'=>'btn btn-primary']}} --}}
    
                <button type="submit" class="btn btn-success" style="width: 100px">Kaydet</button>
                {{-- buraya bak!! --}}
            </div>
            {!! Form::close() !!} 
            
            <!--form oluşturma-->

            @endsection
        </div>
    </div>
</section>