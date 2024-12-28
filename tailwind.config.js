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
