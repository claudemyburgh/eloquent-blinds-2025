<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Sushi\Sushi;

    class NavigationLink extends Model
    {
        use Sushi;

        const HOME_PAGE_ROUTE = "home";
        const ABOUT_PAGE_ROUTE = "about";
        const QUOTE_PAGE_ROUTE = "quote.index";

        const FAQS_PAGE_ROUTE = "faqs.index";

        const SHUTTER_PAGE_ROUT = "";

        protected array $rows = [
            [
                "name" => "Home",
                "slug" => "home",
                "route" => self::HOME_PAGE_ROUTE,
                "classes" => "hover:text-primary-500 dark:text-shadow ",
                "visible" => true,
                "dropdown" => false,
            ],
            [
                "name" => "Shutters",
                "slug" => "shutters",
                "route" => "categories.index",
                "classes" => "hover:text-primary-500 dark:text-shadow ",
                "visible" => true,
                "dropdown" => true,
            ],
            [
                "name" => "Blinds",
                "slug" => "blinds",
                "route" => "categories.index",
                "classes" => "hover:text-primary-500 dark:text-shadow ",
                "visible" => true,
                "dropdown" => true,
            ],
            [
                "name" => "Faq's",
                "slug" => "faqs",
                "route" => self::FAQS_PAGE_ROUTE,
                "classes" => "hover:text-primary-500 dark:text-shadow ",
                "visible" => true,
                'dropdown' => false,
            ],
            [
                "name" => "Free Quote",
                "slug" => "quote",
                "route" => self::QUOTE_PAGE_ROUTE,
                "classes" => "btn btn-gradient text-white ",
                "visible" => true,
                'dropdown' => false,
            ],
        ];

        protected array $schema = [
            'visible' => 'boolean',
            'dropdown' => 'boolean',
            'classes' => 'string'
        ];

//        protected function sushiShouldCache(): bool
//        {
//            return true;
//        }


    }
