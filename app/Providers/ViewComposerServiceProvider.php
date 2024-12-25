<?php

    namespace App\Providers;

    use App\Composers\NavigationComposer;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;


    class ViewComposerServiceProvider extends ServiceProvider
    {
        /**
         * Register services.
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap services.
         */
        public function boot(): void
        {
            View::composer(['components.navigation.index', 'components.marquee.full'], NavigationComposer::class);
        }
    }
