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

mix.disableSuccessNotifications();

mix.setPublicPath('./public')
mix.js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
  ])
  .options({processCssUrls: false})
  .webpackConfig({
    output: {chunkFilename: 'js[name].js?id=[chunkhash]'}
  });

mix.override((webpackConfig) => {
  webpackConfig.resolve.modules = [
    'node_modules',
    __dirname + "/vendor/spatie/laravel-medialibrary-pro/resources/js",
  ];
});
