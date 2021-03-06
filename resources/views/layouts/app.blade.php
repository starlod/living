<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset_ver('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('components._header')
        @yield('content')
        @include('components._footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset_ver('js/app.js') }}"></script>
</body>
</html>
