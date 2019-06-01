<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
    @include('layouts.header')
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
    .site-footer {
        margin-top: 40px;
        
    }
    .site-header {
        margin-bottom: 20px; 
    }
    </style>
</head>
<body>
        <header id="masthead" class="site-header" role="banner">
            @include('layouts.menubar')
        </header>
        @yield('content')
        <footer id="colophon" class="site-footer" role="contentinfo">
            @include('layouts.footer')
        </footer>
</body>
</html>
