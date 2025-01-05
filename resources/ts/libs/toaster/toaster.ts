// src/toaster.ts

type ToastType = "success" | "warning" | "info" | "error"

interface ToastOptions {
    title: string
    description?: string // Make description optional
    type?: ToastType
    iconSVG?: string // Optional SVG icon
    duration?: number // in milliseconds
}

class Toaster {
    private static toastContainer: HTMLElement

    constructor() {
        if (!Toaster.toastContainer) {
            Toaster.toastContainer = document.createElement("div")
            Toaster.toastContainer.className = "toast-container"
            document.body.appendChild(Toaster.toastContainer)
        }
    }

    public show(options: ToastOptions) {
        const toast = document.createElement("div")
        toast.className = "toast"

        const content = document.createElement("div")
        content.className = "toast-content"
        toast.appendChild(content)

        const flexContainer = document.createElement("div")
        flexContainer.className = "flex-container"
        content.appendChild(flexContainer)

        const iconContainer = document.createElement("div")
        iconContainer.className = "icon-container"
        flexContainer.appendChild(iconContainer)

        // Add custom SVG icon if provided
        if (options.iconSVG) {
            const icon = document.createElement("div")
            icon.innerHTML = options.iconSVG // Insert the SVG directly
            iconContainer.appendChild(icon)
        }

        const textContainer = document.createElement("div")
        textContainer.className = "text-container"
        flexContainer.appendChild(textContainer)

        const title = document.createElement("p")
        title.className = "toast-title"
        title.innerText = options.title
        textContainer.appendChild(title)

        // Only add description if it is provided
        if (options.description) {
            const description = document.createElement("p")
            description.className = "toast-description"
            description.innerText = options.description
            textContainer.appendChild(description)
        }

        const closeButtonContainer = document.createElement("div")
        closeButtonContainer.className = "close-button-container"
        flexContainer.appendChild(closeButtonContainer)

        const closeButton = document.createElement("button")
        closeButton.className = "close-button"
        closeButton.innerText = "✖"
        closeButton.onclick = () => {
            this.closeToast(toast)
        }
        closeButtonContainer.appendChild(closeButton)

        // Create a progress bar
        const progressBar = document.createElement("div")
        progressBar.className = "progress-bar"
        toast.appendChild(progressBar)

        Toaster.toastContainer.appendChild(toast)

        // Trigger the slide-in animation
        setTimeout(() => {
            toast.classList.add("slide-in-active")
        }, 10) // Delay to allow the initial class to take effect

        const duration = options.duration || 3000
        let progress = 0
        const interval = 10 // Update every 10ms
        const totalSteps = duration / interval

        let progressInterval: number // Use number for browser environment
        const startProgress = () => {
            progressInterval = setInterval(() => {
                progress += 1
                progressBar.style.width = `${(progress / totalSteps) * 100}%`
                if (progress >= totalSteps) {
                    clearInterval(progressInterval)
                    this.closeToast(toast)
                }
            }, interval)
        }

        const pauseProgress = () => {
            clearInterval(progressInterval)
        }

        toast.addEventListener("mouseenter", pauseProgress)
        toast.addEventListener("mouseleave", startProgress)

        startProgress()
    }

    private closeToast(toast: HTMLElement) {
        toast.classList.remove("slide-in-active")
        toast.classList.add("slide-out")
        setTimeout(() => {
            toast.remove()
        }, 300) // Duration of the slide-out animation
    }
}

// Export the Toaster class as default
export default Toaster
