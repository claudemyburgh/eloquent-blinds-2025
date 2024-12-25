<div {{ $attributes->merge(['class' => 'relative marquee-ticker splide bg-gray-100 dark:bg-gray-950 text-gray-700 overflow-hidden whitespace-nowrap dark:text-white']) }}>
    <x-bits.box-light-line :top="true"/>
    <div class="splide__track w-full py-2">
        <div class="splide__list">
            {{ $slot }}
        </div>
    </div>
</div>
