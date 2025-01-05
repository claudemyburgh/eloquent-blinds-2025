@php
    $classes = "block text-sm font-medium text-gray-600 dark:text-gray-300"
@endphp

<label for="{{ $for }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot->isNotEmpty() ? $slot : $fallback }}
    {!! $requered ?? '<span class="text-red-500">*</span>' !!}
</label>


