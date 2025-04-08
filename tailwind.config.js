/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            screens: {//bootstrap breakpoints size
                xs: "375",
                smb:"576",
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1536px"
            },
            colors: {
                blue: '#1fb6ff',
                purple: '#7e5bef',
                pink: '#ff49db',
                orange: '#ff7849',
                green: '#13ce66',
                yellow: '#ffc82c',
                'gray-dark': '#273444',
                'gray-light': '#d3dce6',
                'light-gray': '#f5f5f5',
                gray: '#8492a6',
                transparent: 'transparent',
                black: '#000',
                white: '#fff',
            },
            fontFamily: {
                bodyFont: ["Poppins", "sans-serif"],
                titleFont: ["Satisfy", "cursive"],
                textFont: ['Graphik', 'sans-serif']
            },
        },
    },
    plugins: [],
};
