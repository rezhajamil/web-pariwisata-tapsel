const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#F56565",
                secondary: "#ED8936",
                accent: "#48BB78",
                success: "#38B2AC",
                warning: "#ECC94B",
                error: "#D53F8C",
                white: "#FFFFFF",
                gray: {
                    light: "#F7FAFC",
                    medium: "#CBD5E0",
                    dark: "#1A202C",
                },
                black: "#000000",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
