let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
      'public/css/style.css'
  ], 'public/css/site.css')
   .scripts([
    'public/js2/jquery.min.js',
     'public/js2/popper.min.js',
          'public/js2/bootstrap.min.js'
      ], 'public/js/site.js');
