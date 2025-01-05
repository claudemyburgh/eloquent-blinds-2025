import "./bootstrap"
import "./web-components/mouse-spotlight"
import "vanilla-headless"
import "./image-slider"
import "./marquee-ticker"
import "./theme-toggle"
import "./lightbox"
import confetti from "canvas-confetti"

// libs
import Toaster from "./libs/toaster/toaster"

const toaster = new Toaster()
window.addEventListener("toast", (event: any) => {
    const { params } = event.__livewire
    toaster.show(params[0])
    confetti({
        particleCount: 200,
        spread: 220,
        origin: { y: 0.4 },
        gravity: 2,
        colors: ["#5eead4", "#2dd4bf", "#0284c7", "#22d3ee"],
    })
})

import.meta.glob(["../img/**/*.{webp,png,svg,jpeg,jpg}"])
