<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    @if (App::environment('production'))
    @include ('layouts.partials._analytics')
    @endif
</head>

<body class="bg-gray-100">
    <livewire:news-banner />
    @include('layouts.partials._header')
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
        @livewireScripts
    </div>

    <!-- footer -->
    <livewire:footer />

</body>

</html>