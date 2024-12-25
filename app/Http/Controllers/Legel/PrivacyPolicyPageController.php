<?php

    namespace App\Http\Controllers\Legel;

    use App\Http\Controllers\Controller;
    use Illuminate\View\View;

    class PrivacyPolicyPageController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(): View
        {
            return view('pages.legal.privacy-policy');
        }
    }
