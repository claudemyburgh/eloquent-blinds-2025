<?php

    namespace App\Providers;

    use Filament\Forms\Components\Textarea;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Set;
    use Illuminate\Support\ServiceProvider;

    class MacroServiceProvider extends ServiceProvider
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
                $this
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', str($state)->slug()));
                return $this;
            });

            TextInput::macro('copyToField', function ($field) {
                $this
                    ->afterStateUpdated(function (Set $set, ?string $state, string $operation) use ($field) {
                        if ($operation !== 'create') {
                            return;
                        }
                        return $set($field, $state);
                    });
                return $this;
            });

            Textarea::macro('copyToField', function ($field) {
                $this
                    ->afterStateUpdated(function (Set $set, ?string $state, string $operation) use ($field) {
                        if ($operation !== 'create') {
                            return;
                        }
                        return $set($field, $state);
                    });
                return $this;
            });


        }
    }
