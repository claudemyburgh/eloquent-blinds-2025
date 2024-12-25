<x-app-layout>
    <div class="wrapper my-12">
        <h1 class="text-shadow-sm mb-2 text-shadow-primary-900 text-4xl">Categories Index</h1>
        <p class="max-w-xl"></p>
        @foreach($categories as $category)
            <div>
                {{ $category->title }}
                <div class="flex space-x-3 items-center ml-6">
                    @foreach($category->children as $child)
                        <a href="">{{ $child->title }}</a>
                        @if(!$loop->last)
                            <span>*</span>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
