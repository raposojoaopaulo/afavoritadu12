import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        colors: {
            'black': '#000000',
            'white': '#ffffff',
            'transparent': 'transparent',
            'pink-light': '#DEB9DF',
            'pink-primary': '#F77AFC',
            'pink-dark': '#AD54B0',
            "gray": {
                50: "#F2F2F2",
                100: "#E3E3E3",
                200: "#C7C7C7",
                300: "#ABABAB",
                400: "#8F8F8F",
                500: "#737373",
                600: "#5C5C5C",
                700: "#454545",
                800: "#2E2E2E",
                900: "#171717",
                950: "#0D0D0D"
            },
            "blue": {
                50: "#EBF3FE",
                100: "#D8E6FD",
                200: "#B1CEFB",
                300: "#8AB5FA",
                400: "#639CF8",
                500: "#3B82F6",
                600: "#0B60EA",
                700: "#0848B0",
                800: "#053075",
                900: "#03183B",
                950: "#010C1D"
            },
            "red": {
                50: "#FDECEC",
                100: "#FCD9D9",
                200: "#F9B4B4",
                300: "#F58E8E",
                400: "#F26969",
                500: "#EF4444",
                600: "#E11313",
                700: "#A90F0F",
                800: "#710A0A",
                900: "#380505",
                950: "#1C0202"
            },
        },
        fontFamily: {
            'poppins': ['Poppins', 'sans-serif'],
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',      
            'xl': '1280px',      
            '2xl': '1536px',
          },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        backgroundImage: {
            'select-store-desk': "url('/public/images/select_store/bg-select-store-desk.webp')",
            'the-store-desk': "url('/public/images/landing/bg/the-store-bg-desk.webp')",
            'social-desk': "url('/public/images/landing/bg/social-bg.webp')",
        },
    },

    plugins: [forms],
};
