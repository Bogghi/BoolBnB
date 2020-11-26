<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>   

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    {{-- TomTom Maps SDK Css --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/2.24.2//SearchBox.css'/>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/css-styles/poi.css'/>
    {{-- TomTom Maps SDK JS --}}
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/2.24.2//SearchBox-web.js'></script>
</head>
<body>
    <div id="app">
        @include('layouts.partials.header')

        <main class="">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
</body>
</html>
