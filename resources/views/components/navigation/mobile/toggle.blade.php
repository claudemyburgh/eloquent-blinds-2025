<button
    aria-controls="mobile_close"
    aria-expanded="false"
    @class([
'lg:hidden inline-flex justify-center items-center size-8 md:size-10 rounded-default border border-gray-300 dark:border-gray-800 shadow-sm bg-white dark:bg-gray-900 text-sm font-medium text-primary-500 ml-2 hover:bg-gray-100
dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-500'])
    type="button">
    <span class="sr-only">Open menu</span>

    <x-heroicon-s-bars-3 class="size-6 inline-flex data-state-open:hidden"/>
    <x-heroicon-s-x-mark class="size-6 hidden data-state-open:data-state-open:hidden"/>
</button>
