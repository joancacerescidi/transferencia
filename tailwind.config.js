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
                3: "repeat(3, minmax(0, 1fr))",
                4: "repeat(4, minmax(0, 1fr))",
                6: "repeat(6, minmax(0, 1fr))",
                 19: "repeat(9, minmax(0, 1fr))",
                11: "repeat(11, minmax(0, 1fr))",
                12: "repeat(12, minmax(0, 1fr))",
                13: "repeat(13, minmax(0, 1fr))",
                14: "repeat(14, minmax(0, 1fr))",
                15: "repeat(15, minmax(0, 1fr))",
                16: "repeat(16, minmax(0, 1fr))",
                17: "repeat(17, minmax(0, 1fr))",
            },
        },
        fontFamily: {
            montserrat: ["Montserrat", "sans-serif"],
        },
    },
    plugins: [],
};