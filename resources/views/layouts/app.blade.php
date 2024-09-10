<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-900 text-white">
        <div class="min-h-screen bg-gray-900">
            @include('layouts.navigation')
            
            <!-- Alert Messages -->
            <div class="container mx-auto p-4">
                @if(session('success'))
                    <div class="bg-green-600 border border-green-400 text-white px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-600 border border-red-400 text-white px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @if(session('message'))
                    <div class="bg-blue-600 border border-blue-400 text-white px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Info!</strong>
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-200">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="p-4 bg-gray-800 text-gray-200">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
