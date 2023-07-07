const mix = require('laravel-mix')

mix.disableSuccessNotifications()

mix.js('resources/js/app.js', 'public/js')
  .postCss('resources/css/filament.css', 'public/css')
  .postCss('resources/css/app.css', 'public/css')
  .options({ processCssUrls: false })
  .webpackConfig({
    output: { chunkFilename: 'js[name].js?id=[chunkhash]' }
  })

if (mix.inProduction()) {
  mix.version()
}
