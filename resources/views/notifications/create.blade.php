@extends('layouts.app');

@section('content')

<section class="section">

    <h1 class="section-heading">Şikayet ve Öneri</h1>

    <div class="container">
            <div class="row">
         
                <div class="col-12 col-md-6 offset-md-3">
                {!! Form::open(['action'=> 'NotificationController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!} 

                <div class="col-12">
                        <div class="form-group">
                                {{Form::label('subject','Konu')}}
                                {{Form::text('subject','',['class'=>'form-control','placeholder'=>''])}}
                        </div>
                </div>
            
            <div class="col-12">
                <div class="form-group">
                        {{Form::label('body','Şikayet veya Öneri')}}
                        {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Yazmaya Başla..'])}}
                </div>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success" style="width: 100px">
                        Kaydet
                </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection