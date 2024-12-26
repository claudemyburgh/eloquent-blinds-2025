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
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="h-5 w-5 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                </svg>
            </a>
        @endif
    </header>
    @foreach(config('contact-details.users') as $user)
        <x-contact.card :name="$user['name']" :phone="$user['phone']" :email="$user['email']" :image="$user['image']"/>
    @endforeach
</section>
