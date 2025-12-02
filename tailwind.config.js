import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                lato: ["Lato"],
                handjet: ["Handjet"],
            },
            colors: {
                greenPrimary: "#000000",
                greenSecondary: "#456882",
                backgroundPrimary: "#1B3C53 ",
                backgroundSecondary: "#456882",
                dark: "#1B1B1B",
            },
        },
    },

    plugins: [
        forms,
        require("daisyui"),
        require("tailwind-scrollbar")({ nocompatible: true }),
    ],
};
