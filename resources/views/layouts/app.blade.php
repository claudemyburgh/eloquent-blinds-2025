<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @livewireStyles
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
</head>
<body class="font-sans antialiased bg-white overflow-x-clip text-gray-800 dark:bg-gray-900 dark:text-gray-300 flex flex-col h-full">
<x-app::skip/>
<x-patterns.grid class="h-100 fixed top-0 inset-x-0 z-0"/>
<x-navigation/>
<main id="main" @class(['my-20 flex-1'])>
    {{ $slot }}
</main>


<x-cta.blinds/>
<x-marquee.full></x-marquee.full>


@if(Route::currentRouteName() !== 'quote.index')
    <div class="wrapper">
        <x-contact.section/>
    </div>
@endif


<x-footer/>
<!-- Scripts -->
@livewireScripts
@filamentScripts
</body>
</html>
