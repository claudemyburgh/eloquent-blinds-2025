<?php

    namespace App\Http\Controllers;

    use App\Models\Faq;
    use Illuminate\Contracts\View\View;

    class FaqsController extends Controller
    {

        /**
         * @return \Illuminate\Contracts\View\View
         */
        public function __invoke(): View
        {
            return view('pages.faqs', [
                'faqs' => Faq::get()
            ]);
        }
    }
