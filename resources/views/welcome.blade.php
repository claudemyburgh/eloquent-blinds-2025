<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/ts/app.ts'])
    </head>
    <body class="font-sans antialiased bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-300">
        <div class="wrapper my-12">
            <h1 class="text-shadow-sm mb-2 text-shadow-primary-900 text-4xl">{{ config('app.name') }}</h1>
            <p class="max-w-xl">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at, cumque doloremque eius excepturi exercitationem fugit harum in inventore, iure libero natus quidem quis ratione, recusandae sed tempore. Maxime, optio!
            </p>
        </div>
    </body>
</html>
