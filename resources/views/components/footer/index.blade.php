@php use Carbon\Carbon; @endphp
<footer class="w-full mt-12" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">
        Useful links for Eloquent Blinds
    </h2>
    <mouse-spotlight data-mouse-light="rgba(14, 165, 233, 0.10)"
                     class="wrapper mouse-light text-gray-700 dark:bg-gray-900/60 bg-gray-200/60 border border-gray-300 dark:border-primary-900/40 dark:text-gray-100 px-6 py-6 rounded-default flex justify-between relative items-center
                     shadow-2xl overflow-clip shadow-primary-900/30 backdrop-blur-sm">
        <x-bits.box-light-line-2/>
        <div class="grid grid-cols-1 md:grid-cols-4 w-full gap-4 md:gap-6 lg:gap-8">
            <div class="mb-6">
                <x-footer.menu.block title="Categories">
                    @foreach($categories as $category)
                        <x-footer.menu.link wire:navigate :href="route('categories.show', $category)">{{ $category->title }}</x-footer.menu.link>
                    @endforeach
                </x-footer.menu.block>
            </div>
            <div class="mb-6">
                <x-footer.menu.block title="Friend's of Us">
                    <x-footer.menu.link target="_blank" href="https://designbycode.co.za">DesignByCode</x-footer.menu.link>
                </x-footer.menu.block>
            </div>
            <div class="mb-6">
                <x-footer.menu.block title="Legal Stuff">
                    <x-footer.menu.link wire:navigate :href="route('legal.policy')">Privacy Policy</x-footer.menu.link>
                    <x-footer.menu.link wire:navigate :href="route('legal.warranties')">Warranties</x-footer.menu.link>
                </x-footer.menu.block>
            </div>
            <div class="mb-6">
                <x-footer.menu.block title="Social Media">
                    @foreach(collect(config('social-media.links')) as $link)
                        <x-footer.menu.link target="_black" :href="$link['url']">{!! $link['raw'] !!}</x-footer.menu.link>
                    @endforeach
                </x-footer.menu.block>
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


