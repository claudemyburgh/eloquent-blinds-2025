<section aria-labelledby="sale-heading" class="relative" id="section">
    <div class="md:overflow-hidden sm:pt-14 ">
        <div
            class="bg-gradient-to-br dark:from-gray-900/80 from-gray-50/80 dark:to-gray-950/70 to-gray-100/70 relative border-y border-gray-200 dark:border-gray-800/50">
            <div aria-hidden="true"
                 class="absolute w-1/2 top-0 h-[1px] left-1/2 bg-gradient-to-r from-transparent via-secondary-500 to-transparent">
                <div
                    class="w-1/2 h-[20px] rounded-b-full absolute top-0 translate-x-1/2 blur-md bg-secondary-500/10 "></div>
            </div>
            <div aria-hidden="true"
                 class="absolute w-1/2 top-full blur-sm rounded-full h-1 left-1/3 bg-gradient-to-r from-transparent via-primary-600 to-transparent">
            </div>
            <div class="wrapper flex flex-col-reverse md:flex-row-reverse min-h-[300px] gap-8 py-12 ">
                <div class="flex-1 relative">
                    <h3 class="heading-1 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black mt-10">
                        Your destination for all things blinds related.</h3>
                    <p class="mt-6 text-lg leading-8 text-gray-500 dark:text-gray-300">
                        We take immense pride in offering a wide selection of high-quality blinds, meticulously designed
                        to elevate your space with style and functionality. Our team of
                        experts is dedicated to providing seamless installation services, ensuring a hassle-free
                        experience from start to finish.
                    </p>
                    <a wire:navigate href="{{ route('quote.index') }}" class="btn mt-4 btn-gradient px-6 py-4 text-white">
                        <span>Get a free quote</span>
                        <x-heroicon-o-envelope class="size-5 ml-2 inline-block"/>
                    </a>
                </div>
                <div class="flex-1 relative">
                    <div class="md:absolute md:right-0 ">
                        <div class="md:ml-24 flex min-w-full md:min-w-max space-x-6 sm:ml-3 lg:space-x-8">
                            <div class="flex space-y-6 flex-col sm:space-x-0 sm:space-y-6 lg:space-y-8">
                                <div class="flex-shrink-0">
                                    <img loading="lazy" width="176" height="176"
                                         class="size-44 shadow-2xl rounded-default object-cover md:size-64 2xl:size-72 "
                                         src="{{ Vite::asset('resources/img/black-blinds.webp') }}" alt="blind example for Eloquent Blinds">
                                </div>

                                <div class="mt-6 flex-shrink-0 sm:mt-0">
                                    <img loading="lazy" width="176" height="176"
                                         class="size-44 shadow-2xl rounded-default object-cover md:size-64 2xl:size-72 "
                                         src="{{ Vite::asset('resources/img/alu-blinds.webp') }}" alt="blind example for Eloquent Blinds">
                                </div>

                            </div>
                            <div class="flex space-y-6 sm:-mt-20 flex-col sm:space-x-0 sm:space-y-6 lg:space-y-8">
                                <div class="flex-shrink-0">
                                    <img loading="lazy" width="176" height="176"
                                         class="size-44 shadow-2xl rounded-default object-cover md:size-64 2xl:size-72 "
                                         src="{{ Vite::asset('resources/img/bambo-blinds.webp') }}" alt="blind example for Eloquent Blinds">
                                </div>

                                <div class="mt-6 flex-shrink-0 sm:mt-0">
                                    <img loading="lazy" width="176" height="176"
                                         class="size-44 shadow-2xl rounded-default object-cover md:size-64 2xl:size-72 "
                                         src="{{ Vite::asset('resources/img/zebra-blinds.webp') }}" alt="blind example for Eloquent Blinds">
                                </div>

                            </div>

                            <div class="flex space-y-6 flex-col sm:space-x-0 sm:space-y-6 lg:space-y-8">
                                <div class="flex-shrink-0">
                                    <img loading="lazy" width="176" height="176"
                                         class="size-44 shadow-2xl rounded-default object-cover md:size-64 2xl:size-72 "
                                         src="{{ Vite::asset('resources/img/honey-blinds.webp') }}" alt="blind example for Eloquent Blinds">
                                </div>

                                <div class="mt-6 flex-shrink-0 sm:mt-0">
                                    <img loading="lazy" width="176" height="176"
                                         class="size-44 shadow-2xl rounded-default object-cover md:size-64 2xl:size-72 "
                                         src="{{ Vite::asset('resources/img/roller-blinds.webp') }}" alt="blind example for Eloquent Blinds">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
