<?php

    namespace App\Filament\Widgets;

    use App\Models\Product;
    use Carbon\Carbon;
    use Filament\Widgets\ChartWidget;
    use function dd;
    use function range;

    class ProductChart extends ChartWidget
    {
        protected static ?string $heading = 'Chart';

        protected function getData(): array
        {
            dd($this->getProductByMonth());
            return [
                //
            ];
        }

        protected function getProductByMonth()
        {
            $now = Carbon::now();
            $months = collect(range(1, 12))->map(function ($month) use ($now) {
                $productPerMonth = [];
                $count = Product::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
                $productPerMonth[] = $count;
                return $now->month($month)->format('M');
            })->toArray();
        }

        protected function getType(): string
        {
            return 'line';
        }
    }
