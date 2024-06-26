<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="/favicon.png" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- <link rel="stylesheet" type="text/css" href="bootstrap-5.3.2-dist/css/bootstrap.min.css"> --}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

        @vite('resources/css/app.css')
        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            function changeFontSize(direction) {
              const root = document.documentElement;
              const currentSize = parseFloat(getComputedStyle(root).fontSize);
              const newSize =
                direction === "increase" ? currentSize * 1.1 : currentSize / 1.1;
              root.style.fontSize = newSize + "px";
            }
        </script>
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
         
        <div class="fixed bottom-0 left-0 w-screen h-6"> 
            <x-secondary-button onclick="changeFontSize('decrease')" class="bg-zinc-700">-</x-primary-button>
                <x-secondary-button onclick="changeFontSize('increase')" class="bg-zinc-700">+</x-primary-button>
        </div>

    </body>
</html>
