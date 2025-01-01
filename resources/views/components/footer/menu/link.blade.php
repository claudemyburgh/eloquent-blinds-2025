<li>
    <a role="menuitem" {{ $attributes->merge([
    'class' => 'hover-underline w-full text-gray-400 dark:text-white/50 flex items-center space-x-2'
]) }}>
        {{ $slot }}
    </a>
</li>

