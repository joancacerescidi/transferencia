/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                // ...colors,
                "text-color": "#0D101C",
                "main-gray": "#A49FBE",
                "main-gray-light": "#A49FBE",
                "main-blue": "#1B46C2",
                "main-red": "#EA3B45",
                "body-bg": "#F8F9FF",
            },
            gridTemplateColumns: {
                // Simple n column grid
                13: "repeat(13, minmax(0, 1fr))",
                15: "repeat(15, minmax(0, 1fr))",
            },
        },
        fontFamily: {
            montserrat: ["Montserrat", "sans-serif"],
        },
    },
    plugins: [],
};