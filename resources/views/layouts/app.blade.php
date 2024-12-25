<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @livewireStyles
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-300 flex flex-col h-full">
<x-app::skip/>
<x-patterns.grid class="h-1/3 "/>
<x-navigation/>
<main id="main" @class(['my-20 flex-1'])>
    {{ $slot }}
</main>

<x-marquee.full></x-marquee.full>

<div class="wrapper">
    <button type="button" is="headless-scrolltop" class="bg-red-500 text-white px-6 py-3 rounded-default" type="button">Scroll to top</button>
</div>

<x-footer/>
<!-- Scripts -->
@livewireScripts
@filamentScripts
</body>
</html>
