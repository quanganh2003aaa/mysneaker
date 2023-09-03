<!doctype html>
<html class="no-js" lang="">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Home || MySneaker </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assetsClient/img/PQTA (1).png')}}">

        @include('Auth.layouts.css')

    </head>
    <body>
        @include('Auth.layouts.header')

        @yield('content')

        @include('Auth.layouts.footer')
        @include('Auth.layouts.js')
    </body>
</html>
