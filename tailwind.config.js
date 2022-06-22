/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        container: {
            center: true,
        },

        extend: {
            screens: {
                sm: { max: "1024px" },
                "2xl": "1230px",
            },
        },
    },
    plugins: [require("flowbite/plugin", "prettier-plugin-tailwindcss")],
};
