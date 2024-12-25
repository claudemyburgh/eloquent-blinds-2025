@props([
    'top' => true,
])

@php
    $classes = " absolute w-1/2 h-px left-0 bg-gradient-to-r from-transparent via-secondary-500 to-transparent ";
    $classes .= $top ? 'top-0' : 'bottom-0'
@endphp

<div aria-hidden="true"
    @class([$classes])>
    <div class="w-1/2 h-[15px] rounded-b-full absolute top-0 translate-x-1/2 blur bg-secondary-500/20 "></div>
</div>
