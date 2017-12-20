var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix
        .sass('index.scss')
        .sass('hotel.scss')
        .sass('search.scss');

    mix
        .babel('common.js')
        .babel('index.js')
        .babel('hotel.js')
        .babel('search.js');
});
