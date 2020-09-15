const mix = require('laravel-mix');

mix.styles([
    'resources/assets/css/bootstrap-v4.5.2.min.css',
    'resources/assets/css/toastr.min.css',
    'resources/assets/css/fontawesome.min.css',
    'resources/assets/css/style.css',
], 'public/css/all.min.css');
mix.scripts([
    'resources/assets/js/jquery-v3.5.1.min.js',
    'resources/assets/js/bootstrap-v4.5.2.min.css',
    'resources/assets/js/popper.min.js',
    'resources/assets/js/toastr.min.js',
    'resources/assets/js/fontawesome.min.js',
    'resources/assets/js/script.js',
], 'public/js/all.min.js');
