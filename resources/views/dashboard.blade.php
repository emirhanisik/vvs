@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                    <h1 class="section-heading">Kontrol Paneli</h1>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Blog Postlarınız</h3>
                            @if(count($posts)>0)
                            <div class="table-dashboard">
                                    
                                @foreach ($posts as $post)
                                    <div class="table-card">
                                        <div>
                                            <img src="/storage/cover_images/{{$post->cover_image}}">
                                        </div>

                                        <div>
                                            <h3>
                                                <a href="/posts/{{$post->id}}"> {{$post->title}}</a>
                                            </h3>
                                        </div>

                                        <div style="flex: 1">
                                        </div>

                                        <div class="d-flex flex-row">
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary mr-2">Düzenle</a>

                                            {!!Form::open(['action' =>['PostsController@destroy', $post->id] ,'method'=>'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'Delete')}}
                                            {{Form::submit('Sil' , ['class' => 'btn btn-danger'])}}
                                            {!!Form::close() !!}
                                        </div> 
                                    </div>
                                @endforeach   
                            </div>
                            @else 
                            <p>Hiç blog yazınız bulunmamaktadır !!</p>
                        @endif 
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection
