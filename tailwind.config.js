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
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brandRed: "#ED1B24",
                brandBlack: "#151515",
                brand900: "#18181B",
                brand800: "#27272A",
                brand700: "#3F3F46",
                brand600: "#52525B",
                brand500: "#71717A",
                brand400: "#A1A1AA",
                brand300: "#D4D4D8",
                brand200: "#E4E4E7",
                brand100: "#F4F4F5",
                brand50: "#FAFAFA",
              },
              screens: {
                sm: "480px",
                md: "768px",
                lg: "976px",
                xl: "1440px",
              },
        },
    },
    plugins: [forms],
};
