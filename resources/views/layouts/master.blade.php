<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kulmik') }}</title>

    <!-- Styles -->
    @if (env('APP_ENV') != 'local')
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @endif
</head>
<body>
    <div id="app">
        @include('layouts.header')
        @include('layouts.nav')
        <div class="container">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
    
    <!-- Scripts -->
    @if (env('APP_ENV') != 'local')
        <script src="{{ secure_asset('js/app.js') }}"></script>
    @else
        <script src="{{ asset('js/app.js') }}"></script>
    @endif

    <script>
        function ConfirmDelete()
        {
          return confirm("Do you want to delete this item?");
        }
    </script>
    @yield('script')
</body>
</html>
