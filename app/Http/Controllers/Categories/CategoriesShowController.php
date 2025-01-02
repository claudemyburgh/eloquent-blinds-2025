<?php

    namespace App\Http\Controllers\Categories;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\View\View;
    use function config;

    class CategoriesShowController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Category $category): View
        {

            return view('pages.categories.show', [
                'category' => $category = Cache::remember('category-' . $category->id, config('cache.time_to_life'), function () use ($category) {
                    return $category->load('media', 'products.media', 'meta');
                }),
                'descendants' => Cache::remember('descendants-' . $category->id, config('cache.time_to_life'), function () use ($category) {
                    return $category->load('descendants.media', 'descendants.products.media');
                }),
                "meta" => $category?->meta?->toArray() ?? config('seo-meta')
            ]);
        }
    }
