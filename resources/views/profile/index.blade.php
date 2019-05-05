<style>
    @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css")
    
    
    .social-btn-holder{
      padding:10px;
      margin-top:5px;
      margin-bottom:5px;
    }
    .social-btn-holder .btn-social{
      font-size:12px;
      font-weight:bold;
    }
    
    .btn-social{
      color: white;
      opacity:0.9;
    }
    .btn-social:hover {
      color: white;
      opacity:1;
    }
    .btn-facebook {
    background-color: #3b5998;
    }
    .btn-twitter {
    background-color: #00aced;
    }
    .btn-linkedin {
    background-color:#0e76a8;
    }
    .btn-github{
      background-color:#000000;
    }
    .btn-google {
      background-color: #c32f10;
    }
    .btn-stackoverflow{
      background-color: #D38B28;
    }
    
    .btn-hackerrank{
      background-color: #27AB5B;
    }
    .btn-soundcloud{
      background-color: #FF7202;
    }
    
    
    
    .centered-text{
      text-align: center;
    }


</style>

@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--This stylesheet should be moved to the head of the document -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


<div class="container">
    <div class="row">
        <div class=" col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                <img class="img-circle img-responsive" src="/storage/profile_images/{{Auth::user()->profile_image}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="centered-text col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
                                    <div itemscope="" itemtype="http://schema.org/Person">
                                    <h2> <span itemprop="name">{{Auth::user()->name}} {{Auth::user()->surname}}</span></h2>
                                        <p itemprop="jobTitle">{{Auth::user()->name}}</p>
                                        <p><span itemprop="affiliation">{{Auth::user()->name}}</span></p>
                                        <p>
                                            <i class="fa fa-map-marker"></i> <span itemprop="addressRegion">{{Auth::user()->city}}, {{Auth::user()->country}}</span>
                                        </p>
                                        <p itemprop="email"> <i class="fa fa-envelope"> </i> <a href="#">{{Auth::user()->email}}</a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 centered-text">
                                {{Auth::user()->bio}}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div id="social-links" class=" col-lg-12">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="google" class="btn btn-social btn-block btn-google" target="_BLANK" href="#">
                                        <i class="fa fa-google"></i> +You
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="twitter" class="btn btn-social btn-block btn-twitter" target="_BLANK" href="http://twitter.com/yourid">
                                        <i class="fa fa-twitter"></i> /yourid
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="github" class="btn btn-social btn-block btn-github" target="_BLANK" href="http://github.com/yourid">
                                        <i class="fa fa-github"></i> /yourid
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-3 social-btn-holder">
                                    <a title="stackoverflow" class="btn btn-social btn-block btn-stackoverflow" target="_BLANK" href="http://stackoverflow.com/users/youruserid/yourid">
                                        <i class="fa fa-stack-overflow"></i> /yourid
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<h3>Your Blog Posts</h3>
                        @if(count($posts)>0)
                        <table class="table table-striped">
                                  
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                            <img style="width :70%" src="/storage/cover_images/{{$post->cover_image}}">
                                        </td>
                                    <td> <h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3></td>
                                     
                                </tr>
                            @endforeach   
                        </table>
                        @else 
                        <p>You have no blog post !!</p>
                    @endif 
@endsection