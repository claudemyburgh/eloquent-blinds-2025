<div class="border-y-1 border-primary-500 flex">
    <x-marquee.ticker>
        @foreach($categories as $category)
            <a wire:navigate rel="preload" href="{{ route('categories.show', $category) }}" class="hover-underline splide__slide inline-block px-4 py-2 transition-colors hover:bg-primary-500/10 rounded-default shrink-0">
                {{$category->title}}
            </a>
            @if($category->products->count())
                @foreach($category->products as $product)
                    <a wire:navigate rel="preload" href="{{ route('products.show', [$category, $product]) }}" class="hover-underline splide__slide inline-block px-4 py-2 transition-colors hover:bg-primary-500/10 rounded-default shrink-0">
                        {{$product->title}}
                    </a>
                @endforeach
            @else
                @foreach($category->children as $child)
                    <a wire:navigate rel="preload" href="{{ route('categories.show', $child) }}" class="hover-underline splide__slide inline-block px-4 py-2 transition-colors hover:bg-primary-500/10 rounded-default shrink-0">
                        {{$child->title}}
                    </a>
                    @foreach($child->products as $product)
                        <a wire:navigate rel="preload" href="{{ route('products.show', [$child, $product]) }}" class="hover-underline splide__slide inline-block px-4 py-2 transition-colors hover:bg-primary-500/10 rounded-default shrink-0">
                            {{$product->title}}
                        </a>
                    @endforeach
                @endforeach
            @endif

        @endforeach
    </x-marquee.ticker>
</div>
