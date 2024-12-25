<?php use Illuminate\Support\Collection;

    return [

        "main" => new Collection([
            [
                'name' => 'Home',
                'slug' => 'home',
                'route' => 'home',
                'classes' => 'hover:text-primary-500 dark:drop-shadow-sm',
                'show' => true,
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact-us',
                'route' => 'contact',
                'classes' => 'hover:text-primary-500 dark:drop-shadow-sm',
                'show' => true,
            ]
        ])


    ];
