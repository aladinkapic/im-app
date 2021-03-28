<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="bs" > <!-- oncontextmenu="return false" -->
<head>
    <title> Alkaris d.o.o Sarajevo </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/public/logo.ico')}}"/>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/system/system.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cdf2a0a58b.js"></script>

    <!-- Javascript scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.0/swiper-bundle.min.js"></script>
    <script src="{{asset('js/system.js')}}"></script>
</head>
<body>
    <!-- Import MENU -->
    @include("system.template.menu.menu")

    @yield('right-menu')

    <div class="main-content">
        <!-- Basic header of every page -->
        @include("system.template.page-header")

        <!-- Main content of every page -->
        @yield('content')

    </div>

    <script>

    </script>
</body>
</html>
