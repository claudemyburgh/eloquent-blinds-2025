import { Splide } from "@splidejs/splide"

document.addEventListener("livewire:navigated", function () {
    if (!document.querySelectorAll("#image-carousel, #thumbnail-carousel").length) return

    const main = new Splide("#image-carousel", {
        type: "slide",
        rewind: true,
        pagination: true,
        arrows: false,
        lazyLoad: "nearby",
        gap: 10,
        speed: 1000,
    })

    const thumbnails = new Splide("#thumbnail-carousel", {
        fixedWidth: 140,
        // fixedHeight: 120,
        gap: 10,
        rewind: true,
        pagination: false,
        isNavigation: true,
        arrows: true,
        speed: 1000,
        lazyLoad: "nearby",
    })

    main.sync(thumbnails)
    main.mount()
    thumbnails.mount()
})
