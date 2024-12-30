<?php

    namespace App\Composers;

    use App\Models\Representative;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\View\View;

    class RepresentativeComposer
    {
        /**
         * Create a new class instance.
         */
        public function __construct() {}

        public function compose(View $view): void
        {
            $representatives = Cache::remember('rep', config('cache.time_to_life'), function () {
                return Representative::active()->with('media')->get();
            });

            $view->with('representatives', $representatives);
        }
    }
