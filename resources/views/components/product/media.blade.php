<div data-lightbox-gallery {{ $attributes->merge(['class' => 'carousel main-carouse relative']) }}>
    <div class="space-y-6">
        @if($product->getMedia('products')->count() > 1)
            <section data-lightbox-gallery id="image-carousel" class="splide" aria-label="Beautiful Images">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($product->getMedia('products') as $media)
                            <li class="splide__slide">
                                <a
                                    data-pswp-width="1000"
                                    data-pswp-height="1000"
                                    data-cropped="true"
                                    target="_blank"
                                    href="{{ $media->getFullUrl('screen')  }}"
                                >
                                    <img height="447" width="597" loading="lazy"
                                         class="bg-gray-200 rounded-default w-full aspect-4/3 object-cover"
                                         src="{{ $media->getFullUrl('large') }}" alt="{{ $product->title }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section
                id="thumbnail-carousel"
                class="splide"
                aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel."
            >
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($product->getMedia('products') as $media)
                            <li class="splide__slide">
                                <img height="103" width="138" loading="lazy"
                                     class="bg-gray-200 rounded-default w-full aspect-4/3 object-cover"
                                     src="{{ $media->getFullUrl('card') }}" alt="{{ $product->title }} main image">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        @else
            <img height="447" width="597" loading="lazy" class="bg-gray-200 rounded-default w-full aspect-4/3 object-cover"
                 src="{{ $product->getFirstMediaUrl('products', 'large') }}" alt="{{ $product->title }} mainimage">
        @endif
    </div>
</div>
