<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="theme-color" content="#efd6db">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/css/guest.scss'])

        <link rel="apple-touch-icon" href="/images/logos/slinc-logo-192x192.png">
        <link rel="apple-touch-startup-image" href="/images/logos/slinc-logo-192x192.png">
        <link rel="apple-touch-startup-image" href="/images/logos/slinc-logo-text-512-512.png">
        <link rel="manifest" href="/manifest.json">

        @livewireStyles
    </head>
    <body class="min-h-screen flex justify-center items-center bg-gray-100">

        <div class="bg-white px-8 py-6 rounded-lg shadow-md w-full mx-4 max-w-96">
            <h1 class="text-2xl font-bold mb-4">@yield('title')</h1>
            
            @yield('content')
        </div>

        @livewireScriptConfig
    </body>
</html>