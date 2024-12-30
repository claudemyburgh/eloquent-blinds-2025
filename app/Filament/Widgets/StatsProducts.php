<?php

    namespace App\Filament\Widgets;

    use App\Models\Category;
    use App\Models\Product;
    use Filament\Widgets\StatsOverviewWidget as BaseWidget;
    use Filament\Widgets\StatsOverviewWidget\Stat;

    class StatsProducts extends BaseWidget
    {
        protected function getStats(): array
        {
            return [
                Stat::make('Products', Product::count())
                    ->description('Amount of listed products'),
                Stat::make('Shutters', Category::where('slug', 'shutters')->withCount('products')->pluck('products_count')->first())
                    ->description('Amount of listed shutters'),
            ];
        }
    }
