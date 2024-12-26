import { Splide } from "@splidejs/splide"
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll"

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
})
