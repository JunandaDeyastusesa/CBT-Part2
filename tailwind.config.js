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
            screens: {
                'xs': '475px', // Extra small devices (custom size)
                'sm': '640px', // Small devices like phones
                'md': '768px', // Medium devices like tablets
                'lg': '1024px', // Large devices like desktops
                'xl': '1280px', // Extra-large devices like large desktops
                '2xl': '1536px', // 2x large devices
              },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
