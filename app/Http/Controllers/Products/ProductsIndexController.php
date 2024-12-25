<?php

    namespace App\Http\Controllers\Products;

    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use Illuminate\View\View;

    class ProductsIndexController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Product $products): View
        {
            return view('pages.products.index', [
                'products' => $products->get()
            ]);
        }
    }
