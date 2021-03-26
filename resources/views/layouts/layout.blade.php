<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title> @yield('title', 'Welcome') </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('head')

        <!-- CSS files -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Javascript files -->
        <script src="{{asset('js/app.js')}}"></script>
    </head>
    <body>
        @yield('body')
    </body>
</html>
