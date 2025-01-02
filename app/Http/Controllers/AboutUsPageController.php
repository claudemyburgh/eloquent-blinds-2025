<?php

    namespace App\Http\Controllers;

    use Illuminate\View\View;

    class AboutUsPageController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(): View
        {
            return view('pages.about-us', [
                "meta" => [
                    "title" => 'About Us',
                    "description" => "Find out more about us."
                ]
            ]);
        }
    }
