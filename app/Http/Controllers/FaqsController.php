<?php

    namespace App\Http\Controllers;

    use App\Models\Faq;
    use Illuminate\Contracts\View\View;
    use Illuminate\Support\Facades\Cache;

    class FaqsController extends Controller
    {

        /**
         * @return \Illuminate\Contracts\View\View
         */
        public function __invoke(): View
        {
            return view('pages.faqs', [
                'meta' => [
                    'title' => "FAQ's",
                    'description' => "Questions. Frequently asked ones. Plus our answers. That's how FAQs work. If you can't find what you're looking for, you can always send us an email with your enquiry."
                ],
                'faqs' => Cache::remember('fags',
                    config('cache.time_to_life'),
                    function () {
                        return Faq::get();
                    }),
            ]);
        }
    }
