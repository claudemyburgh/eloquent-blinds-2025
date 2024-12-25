<?php

    namespace App\Livewire\Products;

    use App\Models\Product;
    use Illuminate\View\View;
    use Livewire\Component;

    class Index extends Component
    {

        public function render(): View
        {
            return view('livewire.products.index', [
                'products' => Product::get()
            ]);
        }
    }
