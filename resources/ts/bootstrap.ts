import axios from "axios"

declare global {
    interface Window {
        axios: any
    }
}

window.axios = axios
window.axios.defaults.withCredentials = true
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"
window.axios.defaults.headers["Access-Control-Allow-Origin"] = "*"
