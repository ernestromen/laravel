/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            gridTemplateColumns: {
                '2':'33% 66%',
                '5':'20% 20% 20% 20% 20%'

              },
         
           colors:{
            'lgrey':'rgb(243 244 246 / var(--tw-bg-opacity))',
            'black':'black'
           }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
