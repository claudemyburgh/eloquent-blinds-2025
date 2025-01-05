<?php

    namespace App\Filament\Widgets;

    use App\Models\Client;
    use App\Models\Representative;
    use App\Models\User;
    use Filament\Widgets\StatsOverviewWidget as BaseWidget;
    use Filament\Widgets\StatsOverviewWidget\Stat;

    class StatsUsers extends BaseWidget
    {
        protected function getStats(): array
        {
            return [
                Stat::make('Users', User::count()),
                Stat::make('Clients', Client::count()),
                Stat::make('Representative', Representative::count()),
            ];
        }
    }
