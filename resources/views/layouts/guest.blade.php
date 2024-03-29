<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- //追加 -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center bg-orange-300">
            <div class="w-40 h-40 mb-6">
                @auth
                    <a href="/">
                        <x-custom-logo class="fill-current text-gray-500" />
                    </a>
                @else
                    <a href="{{ url('/') }}">
                        <x-custom-logo class="fill-current text-gray-500" />
                    </a>
                @endauth
            </div>
            <div class="w-full sm:max-w-md px-6 py-4 bg-orange-300 rounded-lg shadow-md">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
