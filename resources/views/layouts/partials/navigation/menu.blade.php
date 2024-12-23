<div {{ $attributes->merge(['class' => 'flex space-x-4 lg:flex hidden ']) }}>
    <x-app::navigation.menu-link :href="route('home')" :active="request()->routeIs('home')">
        {{ __('Home') }}
    </x-app::navigation.menu-link>
    <x-app::navigation.menu-link :href="route('home')" :active="request()->routeIs('home')">
        {{ __('Services') }}
    </x-app::navigation.menu-link>
    <x-app::navigation.menu-link :href="route('home')" :active="request()->routeIs('home')">
        {{ __('Free Quote') }}
    </x-app::navigation.menu-link>
</div>
