@php use Carbon\Carbon; @endphp
<footer class="w-full mt-12" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">
        Useful links for Eloquent Blinds
    </h2>
    <mouse-spotlight data-mouse-light="rgba(14, 165, 233, 0.10)"
                     class="wrapper mouse-light text-gray-700 dark:bg-gray-900/60 bg-gray-200/60 border border-gray-300 dark:border-primary-900/40 dark:text-gray-100 px-6 py-6 rounded-global flex justify-between relative items-center shadow-2xl overflow-clip shadow-primary-900/30 backdrop-blur-sm">
        <x-bits.box-light-line-2/>
        <div class="grid grid-cols-1 md:grid-cols-4 w-full gap-4 md:gap-6 lg:gap-8">
            <div class="mb-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, voluptatibus!
            </div>
            <div class="mb-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, quos!
            </div>
            <div class="mb-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, nam!
            </div>
            <div class="mb-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, fuga!
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


