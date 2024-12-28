import preset from "./vendor/filament/support/tailwind.config.preset"
import colors from "tailwindcss/colors"

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.{js,ts}",
        "./config/*.php",

        // Filament
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: colors.sky,
                secondary: colors.cyan,
                tri: colors.amber,
                gray: colors.gray,
            },
            borderRadius: {
                default: "0.5rem",
            },
            dropShadow: {
                hard: ["0 3px 3px rgba(0, 0, 0, 0.5)", "0 6px 6px rgba(0, 0, 0, 0.25)"],
            },
            animation: {
                "spin-slow": "spin 13s linear infinite",
                "slide-slow": "slide-x 3s ease-in-out infinite",
                slide: "slide-x 2s ease-in-out infinite",
                "slide-fast": "slide-x 1s ease-in-out infinite",
                "slide-out-right": "slide-out 4s ease-in-out",
            },
            keyframes: {
                "slide-x": {
                    "0%, 100%": { transform: "translateX(0)" },
                    "50%": { transform: "translateX(100%)" },
                },
                "slide-out": {
                    "0%, 100%": { transform: "translateX(200)" },
                    "5%, 95%": { transform: "translateX(0)" },
                },
            },
            aspectRatio: {
                "4/3": "4 / 3",
                facebook: "40 / 21",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/container-queries"),
        require("@designbycode/tailwindcss-mask-image"),
        require("@designbycode/tailwindcss-text-shadow"),
    ],
}
