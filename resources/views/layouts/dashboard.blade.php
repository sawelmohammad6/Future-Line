<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Future Line Trading buyer dashboard')">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'Buyer Dashboard') | Future Line Trading</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar />
    <main class="bg-slate-100">
        <div class="mx-auto max-w-[1600px] lg:flex">
            <x-dashboard-sidebar />
            <div class="min-w-0 flex-1">
                @yield('content')
            </div>
        </div>
    </main>
    <x-footer />
</body>
</html>
