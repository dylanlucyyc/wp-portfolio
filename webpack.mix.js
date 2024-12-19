// webpack.mix.js
const mix = require('laravel-mix');

mix.js('assets/src/scripts/main.js', 'scripts')
  .sass('assets/src/styles/main.scss', 'styles')
  .setPublicPath('assets/dist')

   .options({
    processCssUrls: false // This is set so our URLs for fonts/images in the stylesheet are correct.
  });