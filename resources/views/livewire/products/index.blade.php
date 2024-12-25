<div @class(['space-y-6'])>
    @foreach($products as $product)
        <livewire:products.card :$product/>
    @endforeach
</div>
