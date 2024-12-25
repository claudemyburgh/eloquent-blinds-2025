<headless-popover class="w-full block">
    <button
        aria-expanded="false"
        aria-haspopup="true"
        id="navigation_link_mobile_{{ $link->slug }}"
        @class([
          $link->classes,
          'flex items-center group w-full px-1.5 rounded py-1 justify-between'
          ])>
        <span>{{ $link->name }}</span>
        <svg aria-hidden="true" class="text-gray-400 ml-[2px] h-5 w-5 group-hover:text-primary-500" fill="currentColor"
             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
                clip-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                fill-rule="evenodd"
            />
        </svg>
    </button>
    <div
        aria-labelledby="navigation_link_mobile_{{ $link->slug }}"
        class="relative w-full inset-x-0 top-full mt-2"
        role="menu"
        tabindex="-1"
        hidden
    >
        <div class="pl-4 border-l ml-4 border-gray-300 dark:border-gray-800 space-y-4">
            @if($link->slug === 'blinds')
                @foreach($categories->where('slug', '!==', 'shutters') as $category)
                    <a wire:navigate class="flex items-center justify-between group relative text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:dark:text-primary-500 focus:text-primary-500 focus:dark:text-primary-500"
                       href="{{ route('categories.index', $category) }}" role="menuitem"> {{$category->title}}
                        <span
                            class="absolute top-1.5 bg-gray-200 dark:bg-gray-900 -left-[22px] border-2 group-hover:border-amber-500 border-gray-300 dark:border-gray-800 w-3 h-3 rounded-full group-focus:ring-0 block"></span>
                    </a>
                @endforeach

            @elseif($link->slug === 'shutters')
                @foreach($categories->where('slug', '===', 'shutters') as $category)
                    @foreach($category->products as $product)
                        <a wire:navigate class="flex items-center justify-between group relative text-gray-700 dark:text-gray-300 hover:text-primary-500 hover:dark:text-primary-500 focus:text-primary-500 focus:dark:text-primary-500"
                           href="{{ route('products.show', [$category, $product]) }}"
                           role="menuitem"> {{$product->title}}
                            <span
                                class="absolute top-1.5 bg-gray-200 dark:bg-gray-900 -left-[22px] border-2 group-hover:border-amber-500 border-gray-300 dark:border-gray-800 w-3 h-3 rounded-full group-focus:ring-0 block"></span>
                        </a>
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
</headless-popover>
