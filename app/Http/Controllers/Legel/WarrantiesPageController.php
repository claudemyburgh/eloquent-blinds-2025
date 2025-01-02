<?php

    namespace App\Http\Controllers\Legel;

    use App\Http\Controllers\Controller;
    use Illuminate\View\View;

    class WarrantiesPageController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(): View
        {
            return view('pages.legal.warranties', [
                'meta' => [
                    'title' => 'Warranties',
                    'description' => "The Company warrants that the following products manufactured by it will be free from defects in material and workmanship for the below mentioned periods from date of delivery.",
                ]
            ]);
        }
    }
