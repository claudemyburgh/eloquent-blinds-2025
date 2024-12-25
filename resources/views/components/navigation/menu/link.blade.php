@props(['link' => $link, 'full' => false])

@php
    // Determine if the current route matches the link's route
    $active = request()->routeIs($link->route);

    // Start with the base classes
    $classes = $full ? 'flex' : 'inline-flex';

    // Add conditional classes for active state
    if ($active) {
        $classes .= ' text-primary-500';
    }

    // Always include these classes
//    $classes .= ' items-center px-1.5 rounded py-1 font-medium hover:text-primary-500 ';
    $classes .= ' btn ';

    $classes .= $link->classes;
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes, 'href' => route($link->route)]) }}>
    {{ $link->name }}
</a>
