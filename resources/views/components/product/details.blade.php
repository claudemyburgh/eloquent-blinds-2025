<div {{ $attributes->merge([]) }}>
    <h1 class="heading-1 text-shadow-[5] text-shadow-primary-500/10 dark:text-shadow-black mt-5 mb-2">{{ $product->title }}</h1>
    <a href="{{ route('categories.show', $product->category) }}" class="rounded-full bg-primary-500/10 hover:bg-primary-500/20 px-3 py-1 mt-2 inline-block text-xs font-semibold leading-6 text-primary-400 ring-1 ring-inset
    ring-primary-500/20">In
        category {{ Str::lower($product->category->title) }}</a>

    @if($product->content)
        <div class="prose prose-lg dark:prose-invert my-2 ">
            @markdown($product->content)
        </div>
    @endif
</div>
