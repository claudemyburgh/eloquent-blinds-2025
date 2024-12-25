<div {{ $attributes->merge(['class' => 'flex space-x-4 lg:flex hidden items-center']) }}>
    @foreach($links as $link)
        @if(!$link->dropdown)
            <x-navigation.menu.link :$link/>
        @else
            <x-navigation.menu.dropdown :$link :$categories/>
        @endif
    @endforeach
</div>
