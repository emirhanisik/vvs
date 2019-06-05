@extends('layouts.app');

@section('content')

<h1>Şikayet ve Öneri</h1>
{!! Form::open(['action'=> 'NotificationController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!} 
<div class="form-group">
        <div class="form-group col-12 col-md-6">
        {{Form::label('subject','Konu')}}
        {{Form::text('subject','',['class'=>'form-control','placeholder'=>''])}}
    </div>
    <div class="form-group">
            {{Form::label('body','Şikayet veya Öneri')}}
            {{Form::textarea('body','',['class'=>'','placeholder'=>'Yazmaya Başla..'])}}
        </div>
        <button type="submit" class="btn btn-success" style="width: 100px">Kaydet</button>
</div>
@endsection