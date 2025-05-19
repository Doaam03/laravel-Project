<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full {{ session('theme', 'light') }}">
<head>
    
{{-- Script DarkMode pour initialiser l'état au chargement --}}
    <x-darkmode-script />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-white dark:bg-gray-900 dark:text-white">

    <!-- 💼 Dashboard wrapper -->
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation') <!-- Si tu as une nav -->

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="p-4">
            {{ $slot }}
        </main>
    </div>

    <!-- Notifications -->
    @if(session('status'))
        <x-toast type="success" :message="session('status')" />
    @endif
    @if ($errors->has('client_exists'))
        <x-toast type="error" :message=" $errors->first('client_exists') " />
    @endif
</body>
</html>
