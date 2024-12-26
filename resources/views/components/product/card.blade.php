<x-ribbon {{ $attributes->merge([
        'class' => 'relative p-[2px] flex rounded-default shadow-2xl shadow-primary-500/50 bg-gradient-to-br from-primary-500 to-secondary-400']) }}
          :show="$product->popular" text="BEST SELLER">
    <div class="w-full flex">
        <div aria-hidden="true" class="absolute w-1/2 top-0 h-[2px] left-0 bg-gradient-to-r from-transparent via-primary-200 to-transparent"></div>
        <a wire:navigate href="{{ $route }}" @class(['relative bg-white group dark:bg-gray-900 rounded-default flex flex-1 flex-col'])>
            <figure @class(['overflow-hidden rounded-t-default border-b-2 border-primary-500/10'])>
                <img width="290" height="290" @class(['rounded-default group-hover:scale-105 transition duration-300 block w-full aspect-square rounded-b-none shadow-md shadow-primary-500/50'])
                src="{{ $product->getFirstMediaUrl('products', 'card') }}" alt="{{ $product->title }}">
            </figure>
            <div class="p-4 text-xs sm:text-sm md:text-lg items-center text-gray-700 font-bold dark:text-white flex justify-between group-hover:underline">
                {{ $product->title }}
                <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>
            </svg>
            </span>
            </div>
        </a>
    </div>
</x-ribbon>

