module.exports = {
    purge: [
        "./resources/views/home.blade.php",
        "./resources/views/layouts/app.blade.php",
        "./resources/js/menu.js",
        "./resources/js/app.js",
        "./resources/js/createform.js",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        fill: (theme) => ({
            red: theme("colors.red.500"),

            green: theme("colors.green.500"),

            blue: theme("colors.blue.500"),
        }),

        extend: {
            gridTemplateColumns: {
                "auto-fit": "repeat(auto-fit, minmax(0, 1fr))",
                "auto-fill": "repeat(auto-fill, minmax(0, 1fr))",
            },
            gridTemplateRows: {
                "auto-fit": "repeat(auto-fit, minmax(0, 1fr))",
                "auto-fill": "repeat(auto-fill, minmax(0, 1fr))",
            },
        },
    },
    variants: {
        fill: ["hover", "focus"],
        extend: {},
    },
    plugins: [],
};
