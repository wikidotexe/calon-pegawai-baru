<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TOPSIS') }}</title>
    <link rel="apple-touch-icon" sizes="1080x1080" href="{{ asset('img/logo.jpg') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-100 
             bg-gradient-to-r bg-backgroundPrimary bg-backgroundSecondary
             min-h-screen flex flex-col items-center justify-center px-4">

    <!-- Logo -->
    <div class="mb-6">
        <a href="/">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="w-20 h-20" style="border-radius: 10px;">
        </a>
    </div>

    <!-- Card -->
    <div class="w-full sm:max-w-md px-6 py-8
                bg-white/20 backdrop-blur-xl 
                border border-white/30 shadow-xl
                rounded-2xl">

        {{ $slot }}

    </div>

</body>
</html>
