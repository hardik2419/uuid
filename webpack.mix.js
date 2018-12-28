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


mix.js('resources/admin/app.js', 'public/vendor/admin/js')
   .js('resources/admin/js/admin.js', 'public/vendor/admin/js')
   .sass('resources/admin/admin.scss', 'public/vendor/admin/css')
   .copy('resources/admin/plugins', 'public/vendor/admin/plugins');


/*mix.webpackConfig({
    module: {
        rules: [{
            test: /\.js?$/,
            exclude: /(bower_components)/,
            use: [{
                loader: 'babel-loader',
                options: mix.config.babel()
            }]
        }]
    }
});*/