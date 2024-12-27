<x-app-layout>
    <section class="relative">
        <div class="wrapper py-24 lg:py-32 space-y-16">
            <div class="lg:flex flex-row-reverse">
                <div class="w-full lg:w-1/2">
                    <figure
                        class="relative p-[2px] w-full mb-6 flex rounded-default shadow-2xl shadow-primary-500/50 bg-gradient-to-br from-primary-500 to-secondary-400">
                        <div aria-hidden="true"
                             class="absolute w-1/2 top-0 h-[2px] left-0 bg-gradient-to-r  from-transparent via-primary-200 to-transparent"></div>
                        <img width="800" height="600" class="rounded-default w-full aspect-4/3 object-cover"
                             src="{{ $category->getFirstMediaUrl('categories', 'large') }}"
                             alt="{{ $category->title }} image">
                    </figure>
                </div>
                <div class="w-full lg:w-1/2 pr-6">
                    <h1 class="col-span-12 heading-1 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black">
                        {{ $category->title }}
                    </h1>
                    @if($category->content)
                        <article class="prose prose-lg dark:prose-invert my-8 ">
                            @markdown($category->content)
                        </article>
                    @endif
                </div>
            </div>
            <x-shutters-comparison class="py-12"/>


            @if($category->products->count() )
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <h3 class="heading-3 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black">
                            {{ $category->products->count() }} {{ Str::plural('Product', $category->products->count()) }} in {{ $category->title }} category
                        </h3>
                    </div>
                    @foreach($category->products as $product)
                        <x-product.card class="col-span-6 md:col-span-4 lg:col-span-3" :$product
                                        route="{{ route('products.show', [$category, $product]) }}"/>
                    @endforeach
                </div>

            @elseif($category->children->count())
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12">
                        <h3 class="heading-3 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black">
                            {{ $category->children->count() }} {{ Str::plural('Category', $category->children->count()) }} in parent category <span class="text-primary-500">{{ $category->title }}</span>
                        </h3>
                    </div>
                    @foreach($category->children as $child)
                        <x-category.card class="col-span-6 md:col-span-4 lg:col-span-3" :category="$child"
                                         route="{{ route('categories.show', $child) }}"/>
                    @endforeach
                </div>

            @else
                <div class="grid grid-cols-12 gap-6 relative ">
                    <div class="col-span-8 relative z-10">
                        <h3 class="heading-3 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black text-balance mb-4">
                            Sorry, we don't have and products listed for {{ $category->title }} for now.
                        </h3>
                        <p class="leading-loose text-balance">But don't worry, we have your sorted. You can always download our brochures or arrange a visit from us. We have samples for most of materials that's is being used in products
                            .</p>
                    </div>
                </div>
            @endif



            @if($descendants->descendants->count())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <div class="col-span-full">
                        <h3 class="heading-3 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black">
                            All products in {{ $category->title }}
                        </h3>
                    </div>
                    @foreach($descendants->descendants as $descendant)
                        @foreach($descendant->products as $product)
                            <x-product.card :$product route="{{ route('products.show', [$descendant, $product]) }}"/>
                        @endforeach
                    @endforeach
                </div>
            @endif
        </div>


    </section>
</x-app-layout>
