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
            return view('pages.legal.privacy-policy', [
                "meta" => [
                    "title" => "Privacy Policy",
                    "description" => " This Privacy Policy document contains types of information that is collected and recorded by Eloquent Blinds and how we use it.",
                ]
            ]);
        }
    }
