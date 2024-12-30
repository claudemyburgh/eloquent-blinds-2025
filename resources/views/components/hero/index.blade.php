<div class="wrapper lg:my-12 grid grid-cols-1 lg:grid-cols-5 relative z-10">
    <div class="lg:col-span-3  z-10 space-y-4">
        <div class="mt-24 sm:mt-32 lg:mt-16">
            <a href="https://view.publitas.com/e-books/quantum-signature/page/1" target="_blank"
               class="inline-flex space-x-4">
                <span class="rounded-full bg-primary-500/10 px-3 py-1 text-sm font-semibold leading-6 text-primary-400 ring-1 ring-inset ring-primary-500/20">What's new</span>
                <span
                    class="inline-flex group items-center space-x-2 text-sm font-semibold leading-6 text-gray-500 dark:text-gray-300 ">
                            <span>E-Catalogue</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor"
                                 class="h-5 w-5 text-gray-500 transition-transform group-hover:translate-x-[5px]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                            </svg>
                          </span>
            </a>
        </div>
        <div class="relative">

            <h1 class="heading-1 text-balance mb-4">
                Supplier and installer of Shutters and Blinds.
            </h1>
            <p class="max-w-2xl leading-text">We offer a wide range of high-quality shutters and blinds at affordable prices. Our shutters and blinds are perfect for any room in the house and will add style and function to your space.
            </p>
            <div class="flex space-x-4">
                <a href="{{ route('home') }}"
                   class="btn mt-4 btn-gradient px-3 py-2 md:px-6 md:py-4 text-white">Request
                    a free quote</a>
                <a href="#learn-more"
                   class=" mt-4 btn-secondary relative btn px-3 py-2 md:px-6 md:py-4 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-100/10">Learn
                    more
                    <div aria-hidden="true"
                         class="absolute w-1/2 top-0 h-[1px] left-5 bg-gradient-to-r from-transparent via-secondary-500 to-transparent">
                        <div class="w-1/2 h-[15px] rounded-b-full absolute top-0 translate-x-1/2 blur bg-secondary-500/20 "></div>
                    </div>
                    <span class="ml-2">
                        <x-heroicon-s-academic-cap class="size-6"></x-heroicon-s-academic-cap>
                    </span>
                </a>
            </div>
        </div>
    </div>


    <mouse-spotlight
        data-mouse-light="rgba(250,250,250,.5)"
        class="bg-gradient-to-br block  from-primary-500 to-secondary-400 opacity-95 lg:opacity-100 w-full lg:w-[175%]  lg:relative  aspect-3/2 lg:col-span-2  rounded-default absolute -top-20 lg:top-0 p-1 mask-image-b lg:mask-image-start-100">
        <img width="1037" height="613" loading="eager"
             class="w-full aspect-3/2  object-cover  max-h-full rounded-default block"
             src="{{ Vite::asset('resources/img/hero.webp') }}" alt="hero blind image">
    </mouse-spotlight>

</div>
