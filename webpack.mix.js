const mix = require('laravel-mix');

// import 'bootstrap'
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


 // externals: {

 // 	vue: Vue

 // },

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .js('node_modules/popper.js/dist/popper.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/web.scss', 'public/css')
    .sass('resources/sass/auth.scss', 'public/css')
    .sass('resources/sass/errors.scss', 'public/css')
    .sourceMaps();
