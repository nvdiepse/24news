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
    .js('resources/js/common.js', 'public/js')
    .js('resources/js/article.js', 'public/js')
    .js('resources/js/category-article.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    .js('resources/js/client.js', 'public/js')
    .js('resources/js/social-network.js', 'public/js')
    .js('resources/js/client/home.js', 'public/js')
    .js('resources/js/client/footer.js', 'public/js')
    .js('resources/js/client/header.js', 'public/js')
    .js('resources/js/client/article-detail.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
