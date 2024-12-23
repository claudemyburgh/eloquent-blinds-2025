<a {{ $attributes->merge(['class' => 'text-2xl font-semibold tracking-tight ', 'href' => route('home') ]) }}>
    <span class="sr-only">{{ config('app.name') }}</span>
    <img height="36" width="250" aria-hidden="true"
         src="{{ Vite::asset('resources/img/brand/light.svg') }}" class=" md:ml-0 h-[2.2rem] hidden dark:block"
         alt="{{ config('app.name') }}">
    <img height="36" width="250" aria-hidden="true"
         src="{{ Vite::asset('resources/img/brand/dark.svg') }}"
         class=" md:ml-0 h-[2.2rem] dark:hidden block" alt="{{ config('app.name') }}">

</a>
