<?php

    use App\Http\Controllers\AboutUsPageController;
    use App\Http\Controllers\Categories\CategoriesIndexController;
    use App\Http\Controllers\Categories\CategoriesShowController;
    use App\Http\Controllers\FaqsController;
    use App\Http\Controllers\HomePageController;
    use App\Http\Controllers\Legel\PrivacyPolicyPageController;
    use App\Http\Controllers\Legel\WarrantiesPageController;
    use App\Http\Controllers\Products\ProductsShowController;
    use App\Http\Controllers\QuotePageController;
    use App\Http\Controllers\SendQuoteController;
    use App\Models\NavigationLink;
    use Illuminate\Support\Facades\Route;

    Route::get('/', HomePageController::class)->name(NavigationLink::HOME_PAGE_ROUTE);
    Route::get('/about-us', AboutUsPageController::class)->name(NavigationLink::ABOUT_PAGE_ROUTE);
    Route::get('/quote', QuotePageController::class)->name("quote.index");
    Route::post('/quote', SendQuoteController::class)->name("quote.send");
    Route::get('/faqs', FaqsController::class)->name(NavigationLink::FAQS_PAGE_ROUTE);
    Route::get('/warranties', WarrantiesPageController::class)->name('legal.warranties');
    Route::get('/privacy-policy', PrivacyPolicyPageController::class)->name('legal.policy');


    Route::get('/categories', CategoriesIndexController::class)->name('categories.index');
    Route::get('/categories/{category:slug}', CategoriesShowController::class)->name('categories.show');

    Route::get('/{category:slug}/{product:slug}', ProductsShowController::class)->name('products.show');


