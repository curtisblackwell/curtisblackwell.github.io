const mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');

mix.js('source/_assets/js/main.js', 'js').vue()
  .sass('source/_assets/sass/main.scss', 'css/main.css')
  .jigsaw({
    watch: ['config.php', 'source/**/*.md', 'source/**/*.php', 'source/**/*.scss'],
    browserSyncOptions: { browser: 'Brave Browser Nightly' },
  })
  .options({
    processCssUrls: false,
    postCss: [
      require('tailwindcss'),
    ],
  })
  .sourceMaps()
  .version();