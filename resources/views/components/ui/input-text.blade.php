@php
    $classes = "shadow-sm bg-gray-50 dark:bg-gray-800/90 dark:border-gray-800 focus:ring-primary-500 focus:border-primary-500 block w-full sm:text-sm border-gray-300 rounded-default focus:bg-gray-550 dark:focus:bg-gray-800/90";
@endphp

<div class="mt-1">
    <input {{ $attributes->merge([
    'id' => $id,
    'class' => $classes,
    'name' => $name,
    'value' => old($name),
   ...$attributes
    ]) }}">
</div>
