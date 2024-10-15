import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Ajout du mode sombre
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {},
        fontFamily: {
            playfair: "'Playfair Display', serif ",
            playwrite: " 'Playwrite DE Grund', cursive",
            lato: " 'Lato', sans-serif",
        },
    },
    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
