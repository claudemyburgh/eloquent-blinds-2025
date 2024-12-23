@php use Carbon\Carbon; @endphp
<footer {{ $attributes->merge([
    'class' => 'w-full mt-auto',
    'aria-labelledby' => 'footer-heading'
]) }}>
    <h2 id="footer-heading" class="sr-only">
        Useful links for {{ config('app.name') }}
    </h2>
    <mouse-spotlight data-mouse-light="rgba(14, 165, 233, 0.10)"
                     class="wrapper mouse-light text-gray-700 dark:bg-gray-900/60 bg-gray-200/60 border border-gray-300 dark:border-primary-900/40 dark:text-gray-100 px-6 py-6 rounded-default flex justify-between relative items-center
                     shadow-2xl overflow-clip
        shadow-primary-900/30
        backdrop-blur-sm">
        <div aria-hidden="true"
             class="absolute w-1/2 top-0 h-[3px] rounded-b-full left-1/3 bg-gradient-to-r from-transparent via-secondary-500 to-transparent">
            <div
                class="w-1/2 h-[20px] rounded-b-full absolute top-0 translate-x-1/2 blur-md bg-secondary-500/10 "></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 w-full gap-4 md:gap-6 lg:gap-8">
            <div class="mb-6">
                menu -1

            </div>
            <div class="mb-6">
                menu -2

            </div>
            <div class="mb-6">
                menu -3
            </div>
            <div class="mb-6">
                menu -4
            </div>
        </div>
    </mouse-spotlight>
</footer>

<div class="wrapper py-12 text-gray-900 dark:text-gray-200 lg:flex justify-between">
    <p>
        &copy;{{ Carbon::now()->year }} {{ config('app.name') }}, (PTY) Ltd. All rights reserved.
    </p>
    <p>
        Design <abbr class="no-underline" title="and">&amp;</abbr> Developed by <a
            class="hover:text-primary-500 underline decoration-gray-300/10 hover-underline decoration-1"
            href="https://designbycode.co.za"
            target="_blank">DesignByCode</a>
    </p>
</div>

<div class="fixed bottom-20 inset-x-0 z-[1001] pointer-events-none">
    <div class="wrapper relative">
        <button class="absolute right-4 pointer-events-auto md:-right-14 h-12 w-12 flex items-center justify-center rounded-default border border-gray-700 bg-primary-500 text-white" is="headless-scrolltop">
            <span class="sr-only">Scroll to top</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor" class="w-6 h-6 pointer-events-none">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 9l6-6m0 0l6 6m-6-6v12a6 6 0 01-12 0v-3"/>
            </svg>
        </button>
    </div>
</div>
