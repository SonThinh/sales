const mix = require('laravel-mix');

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
mix.styles([
    'resources/assets/css/bootstrap-v4.5.2.min.css',
    'resources/assets/css/jquery.fancybox.min.css',
    'resources/assets/css/toastr.min.css',
], 'public/css/all.min.css');
mix.scripts([
    'resources/assets/js/jquery-v3.5.1.min.js',
    'resources/assets/js/bootstrap-v4.5.2.min.css',
    'resources/assets/js/popper.min.js',
    'resources/assets/js/jquery.fancybox.min.js',
    'resources/assets/js/toastr.min.js',
    'resources/assets/js/script.js',
], 'public/js/all.min.js');
