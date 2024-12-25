<x-app-layout>
    <div class="wrapper my-12">
        <h1 class="text-shadow-sm mb-2 text-shadow-primary-900 text-4xl">Categories for {{ $category->title }}</h1>
        <p class="max-w-xl">

        @foreach($category->children as $category)
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

            </p>
    </div>
</x-app-layout>
