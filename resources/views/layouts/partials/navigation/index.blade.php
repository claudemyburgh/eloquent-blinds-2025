<headless-navigation class="w-full fixed top-2 inset-x-0">
    <mouse-spotlight
        data-mouse-light="rgba(14, 165, 233, 0.10)"
        class="wrapper relative mouse-light text-gray-500 dark:bg-gray-900/80 bg-gray-200/90 border border-gray-300 dark:border-primary-500/50 dark:text-gray-100  py-2 rounded-b-default md:rounded-default flex flex-wrap justify-between
        items-center shadow-2xl shadow-primary-500/50 backdrop-blur-sm ">
        <x-app::navigation.brand/>
        <x-app::navigation.wrapper>
            <x-app::navigation.menu/>
            <x-app::navigation.mobile-toggle/>
            <x-app::navigation.theme/>
        </x-app::navigation.wrapper>
    </mouse-spotlight>
</headless-navigation>
