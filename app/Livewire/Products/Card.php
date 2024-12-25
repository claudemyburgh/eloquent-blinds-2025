<?php

    namespace App\Livewire\Products;

    use App\Models\Product;
    use Illuminate\View\View;
    use Livewire\Component;

    class Card extends Component
    {

        public Product $product;

        public function render(): View
        {
            return view('livewire.products.card');
        }
    }
