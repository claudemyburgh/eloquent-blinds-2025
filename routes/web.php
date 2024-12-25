<?php

    use App\Http\Controllers\AboutUsPageController;
    use App\Http\Controllers\Categories\CategoriesIndexController;
    use App\Http\Controllers\Categories\CategoriesShowController;
    use App\Http\Controllers\HomePageController;
    use App\Http\Controllers\Products\ProductsIndexController;
    use App\Http\Controllers\Products\ProductsShowController;
    use App\Models\NavigationLink;
    use Illuminate\Support\Facades\Route;

    Route::get('/', HomePageController::class)->name(NavigationLink::HOME_PAGE_ROUTE);
    Route::get('/about-us', AboutUsPageController::class)->name(NavigationLink::ABOUT_PAGE_ROUTE);


    Route::get('/categories', CategoriesIndexController::class)->name('categories.index');
    Route::get('/categories/{category:slug}', CategoriesShowController::class)->name('categories.show');

    Route::get('/products', ProductsIndexController::class)->name('products.index');
    Route::get('/{category:slug}/{product:slug}', ProductsShowController::class)->name('products.show');

