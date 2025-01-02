<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    @production
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || []
                w[l].push({
                    "gtm.start":
                        new Date().getTime(), event: "gtm.js",
                })
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != "dataLayer" ? "&l=" + l : ""
                j.async = true
                j.src =
                    "https://www.googletagmanager.com/gtm.js?id=" + i + dl
                f.parentNode.insertBefore(j, f)
            })(window, document, "script", "dataLayer", '{{ config('google.gtag.id') }}')</script>
    @endproduction

    {{ $seo ?? '' }}


    <!-- favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @livewireStyles
    @filamentStyles
    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
</head>
<body class="font-sans  antialiased bg-white overflow-x-clip text-gray-800 dark:bg-gray-900 dark:text-gray-300 flex flex-col h-full">

@production
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id={{ config('google.gtag.id') }}"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endproduction


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
@livewireScriptConfig
@filamentScripts
</body>
</html>
