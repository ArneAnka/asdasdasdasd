<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Gratis aggregerad handelsinformation med dagliga sammanställning av nyheter från svenska nyhetssidor.">
        <meta name="keywords" content="aggregerad, handelsinformation, kryptovaluta, kryptovalutor, aggregerad handelsinformation, nyheter, sverige">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}?version=1">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @if (App::environment('production'))
            @include ('layouts.partials._analytics')
        @endif 

    </head>
    <body>
            {{ $slot }}
        @livewireScripts
    </body>
</html>
