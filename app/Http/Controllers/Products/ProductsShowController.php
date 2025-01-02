<?php

    namespace App\Http\Controllers\Products;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\View\View;

    class ProductsShowController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Category $category, Product $product): View
        {
            return view('pages.products.show', [
                'product' => $product = Cache::remember('product-id-' . $product->id,
                    config('cache.time_to_life'),
                    function () use ($product) {
                        return $product->load(['media', 'meta']);
                    }),
                'category' => Cache::remember('product-category-id-' . $category->id,
                    config('cache.time_to_life'),
                    function () use ($category) {
                        return $category->load('products.media');
                    }),
                'meta' => $product?->meta?->toArray() ?? config('seo-meta')
            ]);
        }
    }
