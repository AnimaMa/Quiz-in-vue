<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{ url('css/all.css') }}">


        <!-- Styles -->
    </head>
    <body>
    {{--@yield('header')--}}


    <section class="content">
            @yield('content')
    </section>

    <footer>

    </footer>

    @if(App::isLocal())
        <script src="/js/all.js"></script>
    @else
        <script src="{{ elixir('js/all.js') }}"></script>
    @endif
    </body>
</html>
