<?php

    namespace App\Http\Controllers\Products;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\View\View;

    class ProductsShowController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Category $category, Product $product): View
        {
            return view('pages.products.show', [
                'products' => $product
            ]);
        }
    }
