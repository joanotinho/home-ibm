const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.minify('public/front/desktop/js/app.js')
 .js('resources/js/front/app.js', 'public/front/desktop/js').version()
//  .js('resources/js/front/mobile/app.js', 'public/front/mobile/js').version()
 .js('resources/js/admin/app.js', 'public/admin/desktop/js').version()
//  .js('resources/js/admin/app-mobile.js', 'public/admin/mobile/js').version()
 // .sass('resources/sass/admin/app.scss', 'public/admin/desktop/css').version()
 // .sass('resources/sass/admin/mobile-app.scss', 'public/admin/mobile/css').version()
 .minify('public/front/desktop/css/app.css')
 .sass('resources/sass/front/app.scss', 'public/front/desktop/css').version()
 .sass('resources/sass/front/app-mobile.scss', 'public/front/mobile/css').version();