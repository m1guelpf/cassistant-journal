let mix = require('laravel-mix');
let build = require('./tasks/build.js');
require('laravel-mix-purgecss');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build/');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch([
            'config.php',
            'source/**/*.md',
            'source/**/*.php',
            'source/**/*.scss',
        ]),
    ],
});

mix.js('source/_assets/js/index.js', 'js')
    .sourceMaps()
    .sass('source/_assets/sass/style.scss', 'css/style.css')
    .sourceMaps()
    .purgeCss({
        extensions: ['html', 'md', 'js', 'php'],
        folders: ['source'],
        whitelistPatterns: [/language/, /hljs/],
    })
    .version();
