<section {{  $attributes->merge(['class' => '@container grid grid-cols-6 my-12 gap-6']) }}>
    <header class="flex justify-center flex-col pr-6 col-span-6 @lg:col-span-6 @5xl:col-span-2">
        <h1 class="heading-1 text-balance">
            @if(Route::currentRouteName() !== 'quote.index')
                Get in touch
            @else
                Get your <span class="text-primary-500">free</span> online quote
            @endif
        </h1>
        <p class="mt-4 text-lg text-gray-500 dark:text-gray-300 sm:mt-3">
            We’d love to hear from you! Send us a message via email, whatapp or simply give us a call.
        </p>
        @if(Route::currentRouteName() !== 'quote.index')
            <a wire:navigate href="{{ route('quote.index') }}" class="btn mt-4 btn-gradient px-6 py-4 text-white self-start">
                <span>Contact Us</span>
                <x-heroicon-o-envelope class="size-5 ml-2 inline-block"/>
            </a>
        @endif
    </header>
    @foreach($representatives as $user)
        <x-contact.card
            name="{{$user->first_name}}"
            surname="{{ $user->lastname }}"
            phone="{{ $user->phone }}"
            email="{{ $user->email }}"
            image="{{ $user->getFirstMediaUrl() }}"/>
    @endforeach

</section>
