<?php

    namespace App\Http\Controllers;


    use App\Models\Product;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\View\View;

    class HomePageController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(): View
        {

//            $categories = Category::live()->with('products', fn ($query) => $query->taylor()->live())->get()->toTree();
//            return $categories->where('slug', 'shutters');


            return view('pages.home', [
                'products' => Cache::remember('home-products', 5, fn () => Product::with('media', 'category')->where('popular', 1)->limit(4)->get()),
            ]);
        }
    }
