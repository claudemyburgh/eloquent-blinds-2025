import { Splide } from "@splidejs/splide"
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll"
import "@splidejs/splide/css/core"

document.addEventListener("livewire:navigated", function () {
    const elms = document.getElementsByClassName("marquee-ticker")
    if (elms.length > 0) {
        for (let i = 0; i < elms.length; i++) {
            // @ts-ignore
            new Splide(elms[i], {
                type: "loop",
                drag: "free",
                focus: "center",
                cloneStatus: true,
                pagination: false,
                arrows: false,
                gap: 50,
                start: 10,
                autoWidth: true,
                preloadPages: 15,
                direction: "ltr",
                isNavigation: false,
                autoScroll: {
                    speed: 1,
                },
            }).mount({ AutoScroll })
        }
    }

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
