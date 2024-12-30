<div {{ $attributes->merge(['class' => 'shadow-lg shadow-primary-600/10 col-span-6 @lg:col-span-6 @5xl:col-span-2']) }}>
    <div class="@container/card">
        <mouse-spotlight class="bg-gray-100 block @[550px]:flex items-center dark:bg-gray-900 overflow-clip relative w-full p-6 rounded-default border dark:border-gray-800 border-gray-300">
            <x-patterns.grid class="h-[50px] z-0 absolute inset-x-0 top-0"/>
            <figure class="w-[149px] shrink-0 h-[149px] @[550px]:w-[110px] @[550px]:h-[110px] mx-auto @[550px]:mx-0 block rounded-default overflow-clip shadow-lg shadow-primary-500/30 border-[4px] border-primary-500/50">
                <img class=" rounded-default w-full" loading="lazy" width="149" height="149" src="{{ $image }}" alt="A profile image for {{ $name }}">
                <figcaption class="sr-only">
                    A profile image for {{ $name }}
                </figcaption>
            </figure>
            <div class="-space-y-0.5 text-center  @[550px]:text-left @[550px]:ml-6 mt-4 @[550px]:mt-0">
                <p class="heading-4 w-full">
                    {{ $name }}
                </p>
                <p class="heading-3 tracking-tight hover-underline w-full text-left  @[550px]:text-center flex justify-center @[550px]:justify-start">
                    <a href="tel:{{ '+27' . ltrim(str_replace(" ", "", $phone), '0')  }}"
                       class="hover:text-primary-500 hover:underline inline-flex ">
                        {{ $phone }}
                    </a>
                </p>
                <p class="hover-underline w-full text-left  @[550px]:text-center flex justify-center @[550px]:justify-start">
                    <a href="{{ 'mailto:' . $email }}" class="hover:text-primary-500 hover:underline inline-flex">{{ $email }}</a>
                </p>
            </div>
        </mouse-spotlight>
    </div>
</div>
