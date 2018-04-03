<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">﻿
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
        <title>@yield('title')</title>
    </head>
    <body>

        <div class="container">
            
            @yield('content')

        </div>


        <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    </body>
</html>