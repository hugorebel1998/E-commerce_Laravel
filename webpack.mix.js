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
    .sass('resources/sass/app.scss', 'public/css');




    mix.styles([
        'public/plant/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
        'public/plant/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
        'public/plant/plugins/OwlCarousel2-2.2.1/animate.css',
        'public/plant/styles/comun.css'
    ], 'public/css/tienda.css');

mix.scripts([
    'public/plant/plugins/greensock/TweenMax.min.js',
    'public/plant/plugins/greensock/TimelineMax.min.js',
    'public/plant/plugins/scrollmagic/ScrollMagic.min.js',
    'public/plant/plugins/greensock/animation.gsap.min.js',
    'public/plant/plugins/greensock/ScrollToPlugin.min.js',
    'public/plant/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
    'public/plant/plugins/easing/easing.js',
    'public/plant/plugins/progressbar/progressbar.min.js',
    'public/plant/plugins/parallax-js-master/parallax.min.js',
    'public/plant/js/custom.js'
], 'public/js/tienda.js');















