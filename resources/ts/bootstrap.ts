import { Alpine, Livewire } from "../../vendor/livewire/livewire/dist/livewire.esm"
import axios from "axios"
import Autosize from "@marcreichel/alpine-autosize"

Alpine.plugin(Autosize)

Livewire.start()

declare global {
    interface Window {
        axios: any
    }
}

window.axios = axios
window.axios.defaults.withCredentials = true
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"
window.axios.defaults.headers["Access-Control-Allow-Origin"] = "*"
