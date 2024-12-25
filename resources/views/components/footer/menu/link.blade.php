<li>
    <a {{ $attributes->merge([
    'class' => 'hover-underline text-gray-400 dark:text-white/50 inline-flex items-center space-x-2'
]) }}>
        {{ $slot }}
    </a>
</li>

