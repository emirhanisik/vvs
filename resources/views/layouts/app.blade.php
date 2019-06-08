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

        <footer class="footer fg--dark py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <h1 class="footer-brand">
                            Veni Vidi Scripsi
                        </h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo unde harum recusandae maxime est itaque velit natus quod voluptates dolore.
                        </p>
                        <p>
                            &copy; Tüm hakları saklıdır
                        </p>
                    </div>
                    <div class="col-12 col-md-4">
                        <h1 class="footer-heading">
                            Site Haritası
                        </h1>
                        <ul class="site-map">
                            <li>
                                <a href="/">Anasayfa</a>
                            </li>
                            <li>
                                <a href="/about">Hakkımızda</a>
                            </li>
                            <li>
                                <a href="/services">Popüler Şehirler</a>
                            </li>
                            <li>
                                <a href="/posts">Bloglar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4">
                        <h1 class="footer-heading">
                            İletişim Bilgileri
                        </h1>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="pr-2">
                                        <i class="fas fa-envelope"></i>
                                    </td>
                                    <td>
                                        iletisim@venividiscripsi.com
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pr-2">
                                        <i class="fas fa-phone"></i>
                                    </td>
                                    <td>
                                        +903124568453
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </footer>
           
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
