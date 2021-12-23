<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
	<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-200">
    <div id="app">
        <div class="py-2 px-3 bg-indigo-600">
            <div class="max-w-3xl mx-auto px-4 flex items-center relative">
                <div class="flex-auto">
                    <a href="/" class="text-white text-lg">Livewire Shopping Basket</a>
                </div>
                <div class="flex-shrink">
                    <livewire:basket-button />
                </div>
            </div>
        </div>
        <div class="max-w-3xl mx-auto p-4">
            <livewire:basket-content />
            @yield('body')
        </div>
    </div>
    @livewireScripts
</body>
</html>
