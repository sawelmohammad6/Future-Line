<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Future Line Trading - professional B2B marketplace for trade partners.')">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'Future Line Trading') | Future Line Trading</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body>
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />
    @stack('scripts')
</body>
</html>
