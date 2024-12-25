<?php

    namespace App\Http\Controllers;


    use App\Models\Category;
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
                'categories' => Category::live()->with('products')->get()->toTree()
            ]);
        }
    }
