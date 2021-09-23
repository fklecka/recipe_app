const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(
    [
        "resources/js/app.js",
        "resources/js/bootstrap.js",
        "resources/js/menu.js",
    ],
    "public/js/app.js"
)
    .js("resources/js/createform.js", "public/js/createform.js")
    .sass("resources/sass/app.scss", "public/css")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);
