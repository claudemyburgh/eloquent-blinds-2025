<?php

    namespace App\Http\Controllers\Categories;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use Illuminate\Support\Facades\Cache;

    class CategoriesIndexController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Category $categories)
        {
            return view('pages.categories.index', [
                'meta' => [
                    "title" => "Categories",
                    "description" => "Discover a world of stunning blinds as you explore our diverse product categories. From timeless classics to contemporary designs, our curated selection offers unparalleled style and functionality.",
                ],
                'categories' => Cache::remember('categories',
                    config('cache.time_to_life'),
                    function () use ($categories) {
                        return $categories->live()->with('media', 'products.media')->get()->toTree();
                    }),
            ]);
        }
    }
