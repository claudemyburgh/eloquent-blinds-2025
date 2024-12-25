@props([
    'show' => true,
    'text' => 'ribbon'
])

<div {{ $attributes->merge(['class' => 'relative']) }}>
    @if($show)
        <div class="absolute size-36 aspect-square -top-2 -right-2 z-10 overflow-hidden pointer-events-none">
            <div aria-hidden="true" class="h-2 aspect-square bg-amber-800 top-0 left-0 absolute"></div>
            <div aria-hidden="true" class="h-2 aspect-square bg-amber-800 bottom-0 right-0 absolute"></div>
            <div
                class="absolute bottom-0 py-2 right-0 w-square-diagonal border-b border-amber-500 bg-gradient-to-b to-amber-400 from-amber-300 font-bold text-xs tracking-wider text-amber-950 shadow-md origin-bottom-right
               rotate-45 text-center">
                {{ $text }}
            </div>
        </div>
    @endif
    {{ $slot }}
</div>
