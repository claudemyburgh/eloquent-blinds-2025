<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class QuotePageController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Request $request): View
        {
            return view("pages.quote", ['meta' => [
                'title' => 'Free Quote',
                'description' => "We’d love to hear from you! Send us a message via email, whatapp or simply give us a call.",
            ]
            ]);
        }
    }
