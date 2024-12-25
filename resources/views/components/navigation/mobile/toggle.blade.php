<button
    aria-controls="mobile_close"
    aria-expanded="false"
    @class([
'lg:hidden inline-flex justify-center items-center h-7 md:h-9 w-7 md:w-9 rounded-default border border-gray-300 dark:border-gray-800 shadow-sm bg-white dark:bg-gray-900 text-sm font-medium text-primary-500 ml-2 hover:bg-gray-100
dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-500'])
    type="button">
    <span class="sr-only">Open menu</span>
    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
        <path data-state class="inline-flex data-state-open:hidden" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        <path data-state class="hidden data-state-open:inline-flex" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
</button>
