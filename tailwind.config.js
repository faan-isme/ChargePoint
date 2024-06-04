/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", "sans-serif"],
            },
            colors: {
                colorblue: "#000D81",
            },
            screens: {
                sm: "300px", // Mobile
                md: "768px", // Tablet
                lg: "1024px", // Laptop
                xl: "1280px", // Desktop
                "2xl": "1536px", // Large Desktop
                laptopLg: "1160px",
                laptopXl: "1360px",
            },
        },
    },
    plugins: [],
};
