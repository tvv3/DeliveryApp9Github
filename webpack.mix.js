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
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

//mai jos sunt linii adaugate de mine pentru sincronizare automata -- refresh automat !
//le-am comentat --- nu mai folosesc aceasta facilitate Laravel Mix pachetele raman instalate
//mix.disableNotifications();
/*
mix.browserSync({
    proxy: 'http://127.0.0.1:8000'
});
*/
