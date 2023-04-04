const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
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
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

// tailwind.config.js
module.exports = {
    purge: [
        // ...
    ],
    theme: {
        extend: {
            backgroundColor: {
                'orange-600': '#F59E0B',
                'orange-500': '#FBBF24',
            },
        },
    },
    variants: {},
    plugins: [],
}

