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
            <x-heroicon-s-sun class="size-4 dark:block hidden"/>
            <x-heroicon-s-moon class="size-4 dark:hidden block"/>
        </button>
    </div>
    <div
        aria-labelledby="theme-switcher"
        aria-orientation="vertical"
        class="hidden origin-top-right absolute w-36 rounded-default overflow-clip shadow-lg bg-white dark:bg-gray-900 ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu"
        tabindex="-1"
    >
        <div class="py-1" role="none">
            <button class="text-gray-700 dark:text-gray-300 flex items-center justify-start px-4 py-2 text-sm hover:bg-primary-100 focus:bg-primary-100 dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:hover:text-gray-900
            focus:outline-none  aria-current:bg-primary-500/25
            w-full"
                    id="menu-item-1"
                    role="menuitem"
                    tabindex="-1"
                    data-theme-name="light">
                    <span class="mr-4">
                        <x-heroicon-s-sun class="size-4"/>
                    </span>
                Light
            </button>
            <button class="text-gray-700 dark:text-gray-300 flex items-center justify-start px-4 py-2 text-sm hover:bg-primary-100 focus:bg-primary-100 dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:hover:text-gray-900
            focus:outline-none aria-current:bg-primary-500/25
            w-full"
                    id="menu-item-0"
                    role="menuitem"
                    tabindex="-1"
                    data-theme-name="dark">
                    <span class="mr-4">
                    <x-heroicon-s-moon class="size-4"/>

                    </span>
                Dark
            </button>
            <button class="text-gray-700 dark:text-gray-300 flex items-center justify-start px-4 py-2 text-sm hover:bg-primary-100 focus:bg-primary-100 dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:hover:text-gray-900
            focus:outline-none aria-current:bg-primary-500/25
            w-full"
                    id="menu-item-2"
                    role="menuitem"
                    tabindex="-1"
                    data-theme-name="system">
                <span class="mr-4">
                    <x-heroicon-s-computer-desktop class="size-4"/>
                </span>
                System
            </button>
        </div>
    </div>
</headless-dropdown>
