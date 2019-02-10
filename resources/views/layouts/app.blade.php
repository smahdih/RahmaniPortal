<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/bootstrap-rtl.min.css') }}" rel="stylesheet">--}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
    <div id="app">
        @include('layouts.headerNav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script src="{{ asset('js/app.js') }}" defer></script>
</html>
