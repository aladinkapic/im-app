<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title> @yield('title', 'Herzlich willkommen') </title>

        @yield('head')

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>

        <!-- CSS files -->
        <link rel="stylesheet" href="{{asset('css/public.css')}}">

        <!-- Javascript files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.0/swiper-bundle.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
        @yield('other-js-link')
    </head>
    <body>
        @include('layouts.includes.menu')
        @include('layouts.includes.breadcrumbs')
        @yield('body')

        @include('layouts.includes.footer')
    </body>
</html>
