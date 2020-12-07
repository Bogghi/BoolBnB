<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('img/boolean-logo.jpg')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

 

    
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- TomTom Maps SDK Css --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/2.24.2//SearchBox.css'/>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/css-styles/poi.css'/>
    {{-- TomTom Maps SDK JS --}}
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/2.24.2//SearchBox-web.js'></script>
    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/3.44.2/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.44.2/js/hosted-fields.min.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>
    <!-- includes the chart js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        @include('layouts.partials.header')

        <main class="">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>
       <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}"></script>   
</body>
</html>
