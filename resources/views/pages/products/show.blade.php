<x-app-layout>
    <x-slot:seo>
        <x-meta-tags :$meta/>
    </x-slot:seo>
    <section class="space-y-16 py-16 lg:py-32 z-10 wrapper">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 dark:border-gray-800 relative">
            <div class="relative">
                <div class="md:sticky md:top-32  space-y-6">
                    <x-product.media :$product/>

                    {{--                    <x-product.variants :$product/>--}}
                </div>
            </div>
            <div>
                <x-product.details :$product/>
                <div id="quote-form" data-product="{{ $product->title }}"></div>
            </div>
        </div>
        <x-shutters-comparison/>
    </section>
</x-app-layout>
