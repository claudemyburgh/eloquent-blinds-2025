<?php

    namespace App\Http\Controllers\Categories;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use Illuminate\View\View;

    class CategoriesShowController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Category $category): View
        {
            return view('pages.categories.show', [
                'category' => $category
            ]);
        }
    }
