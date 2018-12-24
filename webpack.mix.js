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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
mix.styles(
    [
        'node_modules/bootstrap/dist/css/bootstrap.css',
        'resources/assets/vendor/PACE/themes/blue/pace-theme-minimal.css',
        'resources/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css',
        'node_modules/animate.css/animate.css/animate.min.css',
        'resources/assets/css/app.css',
        'node_modules/font-awesome/css/font-awesome.css/font-awesome.min.css',
        'resources/assets/css/materialdesignicons.min.css',
        'resources/assets/css/themify-icons.css'
    ], 'public/css/template-css.css');
mix.scripts(
    [
        'resources/assets/js/vendor.js',
        'resources/assets/js/app.min.js'
    ], 'public/js/template-js.js');
mix.copy('node_modules/jquery-sparkline/jquery.sparkline.js', 'public/js/template-jquery.js');
mix.copy('resources/assets/css/style.css', 'public/css/style.css');
mix.copy('resources/assets/js/dashboard/default.js', 'public/js/default.js');
mix.copy('node_modules/jquery/dist/jquery.js', 'public/js/bootstrap1.js');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/datepicker.js');
mix.copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js', 'public/js/datepicker.js');
mix.copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css', 'public/js/datepicker.css');
