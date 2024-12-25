<headless-dropdown class="relative inline-block text-left z-10" placement="bottom bottom-start" offset="0 6" popper>
    <div>
        <button
            aria-expanded="false"
            aria-haspopup="true"
            class="inline-flex justify-center items-center  h-7 md:h-9 w-7 md:w-9  rounded-default border border-gray-300 dark:border-gray-800 shadow-sm bg-white dark:bg-gray-900 text-sm font-medium text-primary-500 hover:bg-gray-100
                dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-500"
            id="theme-switcher"
            type="button"
        >
            <span class="sr-only">Toggle between light and dark mode</span>
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path class="dark:block hidden" stroke-linecap="round" stroke-linejoin="round"
                      d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                <path class="dark:hidden block" stroke-linecap="round" stroke-linejoin="round"
                      d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
            </svg>
        </button>
    </div>
    <div
        aria-labelledby="theme-switcher"
        aria-orientation="vertical"
        class="hidden origin-top-right absolute w-38 rounded-default overflow-clip shadow-lg bg-white dark:bg-gray-900 ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu"
        tabindex="-1"
    >
        <div class="py-1" role="none">
            <button class="text-gray-700 dark:text-gray-300 flex items-center justify-start px-4 py-2 text-sm hover:bg-primary-100 focus:bg-primary-100 dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:hover:text-gray-900
            focus:outline-none
            w-full"
                    id="menu-item-1"
                    role="menuitem"
                    tabindex="-1"
                    data-theme-name="light">
                                <span class="mr-4">
<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
</svg></span>
                Light
            </button>
            <button class="text-gray-700 dark:text-gray-300 flex items-center justify-start px-4 py-2 text-sm hover:bg-primary-100 focus:bg-primary-100 dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:hover:text-gray-900
            focus:outline-none
            w-full"
                    id="menu-item-0"
                    role="menuitem"
                    tabindex="-1"
                    data-theme-name="dark">
                                <span class="mr-4">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                            </svg>
                        </span>
                Dark
            </button>
            <button class="text-gray-700 dark:text-gray-300 flex items-center justify-start px-4 py-2 text-sm hover:bg-primary-100 focus:bg-primary-100 dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:hover:text-gray-900
            focus:outline-none
            w-full"
                    id="menu-item-2"
                    role="menuitem"
                    tabindex="-1"
                    data-theme-name="system">
                <span class="mr-4">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z"/>
                </svg></span>
                System
            </button>
        </div>
    </div>
</headless-dropdown>
