@props(['active' => false])

<a {{ $attributes->class([
    'inline-flex items-center px-1.5 rounded py-4 font-medium hover:text-primary-500',
    'text-gray-500' => !$active,
    'text-primary-500' => $active,
]) }}>
    {{ $slot }}
</a>
