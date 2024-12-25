@props([
    'title' => $title
])

<h3 class="text-md font-semibold text-gray-400 tracking-wider uppercase">{{ $title }}</h3>
<ul role="menu" class="mt-4 space-y-3">
    {{ $slot }}
</ul>
