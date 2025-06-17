import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import rtl from 'tailwindcss-rtl';

/** @type {import('tailwindcss').Config} */
export default {
   darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            // fontFamily: {
            //     sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            // },
            fontFamily: {
              cairo: ['Cairo', 'sans-serif'],
            },
            keyframes: {
               'move-return': {
                 '0%': { transform: 'translateX(0)' },
                 '50%': { transform: 'translateX(100px)' },
                 '100%': { transform: 'translateX(0)' },
               },
             },
             animation: {
               'move-return': 'move-return 2s ease-in-out infinite',
             },
        },
    },

    plugins: [
        forms,
        rtl, //
    ],
};
