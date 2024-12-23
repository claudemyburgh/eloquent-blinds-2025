class MouseSpotlight extends HTMLElement {
  constructor() {
    super()
    this.classList.add("mouse-light")

    const color = this.getAttribute("data-mouse-light")
    if (color) {
      this.style.setProperty("--light", color)
    }
  }

  connectedCallback() {
    this.addEventListener("mousemove", this.mouseMover.bind(this))
  }

  disconnectedCallback() {
    this.removeEventListener("mousemove", this.mouseMover)
  }

  /**
   * Get mouse position within this component
   * @param e
   */
  mouseMover(e: MouseEvent) {
    const { currentTarget: target } = e
    const rect = (target as HTMLElement).getBoundingClientRect()
    let y = e.clientY - rect.top
    let x = e.clientX - rect.left
    ;(target as HTMLElement).style.setProperty("--mouse-x", `${x}px`)
    ;(target as HTMLElement).style.setProperty("--mouse-y", `${y}px`)
  }
}

customElements.define("mouse-spotlight", MouseSpotlight)
