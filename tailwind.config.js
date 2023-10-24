import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'false',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    daisyui: {
        themes: ["light", {
            hazzy: {
            "primary": "#19263f",
            "secondary": "#283c63",
            "accent": "#1970C3",
            "neutral": "#151417",
            "base-100": "#FFFFFF",
            "info": "#1e40af",
            "success": "#15803d",
            "warning": "#fbbf24",
            "error": "#f43f5e",
            },
        },],
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms, require("daisyui")],
};
