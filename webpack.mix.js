const mix = require('laravel-mix');

mix.disableSuccessNotifications()

mix.setPublicPath('./public')

mix.js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
  ])
  .options({processCssUrls: false})
  .webpackConfig({
    output: {chunkFilename: 'js[name].js?id=[chunkhash]'}
  })

mix.override((webpackConfig) => {
  webpackConfig.resolve.modules = [
    'node_modules',
    __dirname + "/vendor/spatie/laravel-medialibrary-pro/resources/js",
  ]
})
