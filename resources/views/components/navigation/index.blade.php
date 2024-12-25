<headless-navigation class="fixed w-full z-20 top-0 lg:top-2 block">
    <mouse-spotlight
        data-mouse-light="rgba(14, 165, 233, 0.10)"
        class="wrapper relative mouse-light text-gray-500 dark:bg-gray-900/80 bg-gray-200/90 border border-gray-300 dark:border-primary-500/50 dark:text-gray-100 px-6 py-4 rounded-b-default md:rounded-default flex flex-wrap justify-between items-center shadow-2xl shadow-primary-500/50 backdrop-blur-sm">
        <x-bits.box-light-line :top="true"/>
        <x-bits.box-light-line :top="false"/>
        <x-navigation.brand/>
        <div class="flex items-center">
            <x-navigation.wrapper>
                <x-navigation.menu :$links :$categories/>
            </x-navigation.wrapper>
            <x-navigation.theme/>
            <x-navigation.mobile.toggle/>

        </div>
        <div hidden id="mobile_close" class="w-full mt-4 lg:hidden space-y-4 font-bold items-center">
            @foreach($links as $link)
                @if($link->route !== 'categories.index')
                    <x-navigation.menu.link :$link :full="true"/>
                @else
                    <x-navigation.mobile.dropdown :$link :$categories/>
                @endif
            @endforeach
        </div>

    </mouse-spotlight>

</headless-navigation>
