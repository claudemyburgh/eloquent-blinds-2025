<?php

    namespace App\Http\Controllers\Categories;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use Illuminate\View\View;

    class CategoriesIndexController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Category $categories): View
        {
            return view('pages.categories.index', [
                'categories' => $categories->live()->get()->toTree()
            ]);
        }
    }
