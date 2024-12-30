<?php

    namespace App\Providers;

    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Set;
    use Illuminate\Support\ServiceProvider;

    class MacoServiceProvider extends ServiceProvider
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
            TextInput::macro('generateSlug', function () {
                $this->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug()));
                return $this;
            });
        }
    }
