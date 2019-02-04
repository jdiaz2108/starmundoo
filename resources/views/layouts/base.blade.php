<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
    .stilo { text-shadow: 0 0 3px #000000; }


    </style>

    <title>@yield('title')StarMundo Colombia</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        @include ('layouts.redes')
        @include ('layouts.menu')
        @include ('layouts.barralogo')
    <div id="app">
        <main>
            @yield('content')
        </main>

    </div>
        @include ('website.videos')
        @include ('layouts.franjasegunda')
        @include ('layouts.franjatercera')
        @include ('layouts.banner_mapa')
        @include ('layouts.derechos')
    <script src="{{ asset('js/app.js') }}" defer></script>
<script>
    $( document ).ready(function() {
        $('.owl-carousel').owlCarousel({
            margin:10,
            video:true,
            lazyLoad:false,
            stagePadding: 50,
            responsive:{
                0 : {
                    items:1,
                    videoWidth: true,
                    videoHeight: 150,
                },
                480:{
                    items:2,
                    videoWidth: true,
                    videoHeight: 400,
                },
                600:{
                    items:3,
                    videoWidth: true,
                    videoHeight: 400,
                }
            }
        });
    });
</script>
</body>
</html>
