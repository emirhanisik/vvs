@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <h1>Posts</h1>
                 <br> 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <br>
                    <br>
                    <h3>Your Blog Posts</h3>
                        @if(count($posts)>0)
                        <table class="table table-striped">
                                  
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                            <img style="width :70%" src="/storage/cover_images/{{$post->cover_image}}">
                                        </td>
                                    <td> <h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3></td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                    {!!Form::open(['action' =>['PostsController@destroy', $post->id] ,'method'=>'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'Delete')}}
                                    {{Form::submit('Delete' , ['class' => 'btn btn-danger'])}}
                                    {!!Form::close() !!}  
                                    
                                    </td> 
                                </tr>
                            @endforeach   
                        </table>
                        @else 
                        <p>You have no blog post !!</p>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
