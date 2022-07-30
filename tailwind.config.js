/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        fontFamily: {
            poppins: ["Poppins", "sans-serif"],
            montserrat: ["Montserrat", "sans-serif"],
        },
        container: {
            center: true,
        },

        extend: {
            screens: {
                sm: { max: "768px" },
            },
            transitionProperty: {
                height: "height",
                spacing: "margin, padding",
            },
        },
    },
    plugins: [require("flowbite/plugin", "prettier-plugin-tailwindcss")],
};
