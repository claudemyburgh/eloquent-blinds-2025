import PhotoSwipeLightbox from "photoswipe/lightbox"
import "photoswipe/style.css"

const lightbox_gallery = document.querySelectorAll("[data-lightbox-gallery]")
if (lightbox_gallery.length) {
    for (let i = 0; i < lightbox_gallery.length; i++) {
        const lightbox = new PhotoSwipeLightbox({
            //@ts-expect-error
            gallery: lightbox_gallery[i],
            children: "a",
            initialZoomLevel: "fit",
            secondaryZoomLevel: "fill",
            showHideAnimationType: "zoom",
            showAnimationDuration: 300,
            hideAnimationDuration: 300,
            maxZoomLevel: 6,
            bgOpacity: 0.85,
            wheelToZoom: true,
            pinchToClose: true,
            pswpModule: () => import("photoswipe"),
        })

        lightbox.init()
    }
}
