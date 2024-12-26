import ThemeManager from "@designbycode/theme-manager"

document.addEventListener("livewire:navigated", () => {
    const themeManager = new ThemeManager()
    themeManager.initButtons()
})
