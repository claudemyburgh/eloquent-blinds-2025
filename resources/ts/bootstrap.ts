import ThemeManager from "@designbycode/theme-manager"
import "./web-components/mouse-spotlight"
import "vanilla-headless"
import "./ticker"

document.addEventListener("livewire:navigated", () => {
    const themeManager = new ThemeManager()
    themeManager.initButtons()
})
