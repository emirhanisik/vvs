<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
   
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
    <div id="app">
        
        <main>
            @include('inc.navbar')

            <div class="main-wrapper">
                @include('inc.messages')
                @yield('content')
            
            </div>
           
        </main>
           
     </div>
     <!--Scripts-->
     <script src="{{ asset('js/app.js') }}" ></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'article-ckeditor' );
     </script>
</body>
</html>
