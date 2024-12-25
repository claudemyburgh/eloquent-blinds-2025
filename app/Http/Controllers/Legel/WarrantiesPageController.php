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
            return view('pages.legal.warranties');
        }
    }
