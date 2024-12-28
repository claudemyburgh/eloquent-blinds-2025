<x-app-layout>
    <x-hero/>

    <div id="learn-more" class="wrapper  md:grid mt-24 md:mt-32 grid-cols-12 gap-8 text-gray-500 dark:text-gray-300">
        <div class="md:col-span-12 mb-6 lg:col-span-6 relative">
            <div class="max-w-full sticky top-32">
                <mouse-spotlight
                    class=" block  shadow-xl shadow-primary-500/10 rounded-lg p-6 border border-primary-500/20">
                    <div aria-hidden="true"
                         class="absolute w-[1px] h-2/3  left-0 top-0 bg-gradient-to-b from-transparent via-secondary-500 to-transparent">
                        <div
                            class="w-[80px] h-full rounded-full absolute top-1/2 -translate-y-1/2 -translate-x-1/2 blur-md bg-secondary-500/10"></div>
                    </div>
                    <h2 class="heading-3 text-shadow-long-[5] text-shadow-primary-500/10 dark:text-shadow-black mt-6">
                        What we can do for you?</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-500 dark:text-gray-300">
                        Whether you're sprucing up your home or office, a living room, bedroom, or any other space in your home, our blinds seamlessly blend style and functionality, elevating your decor to new heights.


                    </p>
                    <p class="mt-6 text-lg leading-8 text-gray-500 dark:text-gray-300">
                        We offer a wide range of products sourced from a variety of suppliers and manufacturers. Our products range from Security Shutters, Indoor Blind, Outdoor Blinds, Blind Automation and more.
                    </p>
                </mouse-spotlight>
            </div>
        </div>
        <div class="md:col-span-12 lg:col-span-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-2 gap-6">
                @if($products)
                    @foreach($products as $product)
                        <x-product.card class="md:[&:nth-child(3)]:hidden lg:[&:nth-child(3)]:flex" :product="$product" route="{{ route('products.show', [$product->category, $product]) }}"/>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
