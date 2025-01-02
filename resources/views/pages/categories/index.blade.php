<x-app-layout>
    <x-slot:seo>
        <x-meta-tags :$meta/>
    </x-slot:seo>
    <section class="relative">
        <div class="wrapper py-24 lg:py-32 space-y-16">
            <div class="lg:flex">
                <div class="w-full pr-6">
                    <h1 class="col-span-12 heading-1 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black">
                        Categories
                    </h1>
                    <article class="prose prose-lg dark:prose-invert my-8">
                        <p>Discover a world of stunning blinds as you explore our diverse product categories. From
                            timeless classics to contemporary designs, our curated selection offers unparalleled style
                            and functionality.</p>
                    </article>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($categories as $category)
                    @if($category->products->count() || $category->children->count())
                        <header class="col-span-full">
                            <h3 class="heading-3"><a wire:navigate class="hover-underline" href="{{ route('categories.show', $category) }}">{{ $category->title }}</a></h3>
                        </header>
                        @if($category->products->count())
                            @foreach($category->products as $product)
                                <x-product.card :$product route="{{ route('products.show', [$category, $product]) }}"/>
                            @endforeach
                        @else
                            @foreach($category->children as $child)
                                <x-category.card :category="$child" route="{{ route('categories.show', $child) }}"/>
                            @endforeach
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
