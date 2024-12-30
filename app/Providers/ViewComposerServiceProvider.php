<?php

    namespace App\Providers;

    use App\Composers\NavigationComposer;
    use App\Composers\RepresentativeComposer;
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
            View::composer([
                'components.navigation.index',
                'components.marquee.full',
                'components.footer.index'
            ], NavigationComposer::class);

            View::composer(['components.contact.section'], RepresentativeComposer::class);
        }
    }
