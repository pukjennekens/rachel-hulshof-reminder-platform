import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#efd6db",
            },
        },
        fontFamily: {
            figtree: ["Figtree", ...defaultTheme.fontFamily.sans],
            amiri: ["Amiri", ...defaultTheme.fontFamily.serif],
        },
    },
    plugins: [require("daisyui")],
};
