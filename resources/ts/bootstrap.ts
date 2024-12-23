import axios from "axios"
import ThemeManager from "@designbycode/theme-manager"
import "vanilla-headless"
import "./web-components/mouse-spotlight"

declare global {
    interface Window {
        axios: any
    }
}

window.axios = axios
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

const themeManager = new ThemeManager()
themeManager.initButtons()
