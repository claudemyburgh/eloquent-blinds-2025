<?php

    namespace App\Http\Controllers;


    use App\Models\Product;
    use Illuminate\Support\Facades\Cache;


    class HomePageController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke()
        {
            return view('pages.home', [
                'products' => Cache::remember('home-products', config('cache.time_to_life'), function () {
                    return Product::with('media', 'category')->where('popular', 1)->limit(4)->get();
                }),
            ]);
        }
    }
