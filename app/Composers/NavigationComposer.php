<?php

    namespace App\Composers;

    use App\Models\Category;
    use App\Models\NavigationLink;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\View\View;

    class NavigationComposer
    {

        public function compose(View $view): void
        {
            $categories = Cache::remember('nav-cat', config('cache.time_to_life'), function () {
                return Category::live()->with('products', fn ($query) => $query->taylor()->live())->get()->toTree();
            });

            $links = Cache::remember('nav-links', config('cache.time_to_life'), function () {
                return NavigationLink::get();
            });

            $view
                ->with('categories', $categories)
                ->with('links', $links);
        }

    }
