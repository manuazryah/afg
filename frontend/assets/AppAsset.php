<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900',
        'lib/bootstrap/css/bootstrap.min.css',
        'lib/nivo-slider/css/nivo-slider.css',
        'lib/owlcarousel/owl.carousel.css',
        'lib/owlcarousel/owl.transitions.css',
        'lib/font-awesome/css/font-awesome.min.css',
        'lib/animate/animate.min.css',
        'lib/venobox/venobox.css',
        'css/nivo-slider-theme.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
        'lib/jquery/jquery.min.js',
        'lib/bootstrap/js/bootstrap.min.js',
        'lib/owlcarousel/owl.carousel.min.js',
        'lib/venobox/venobox.min.js',
        'lib/knob/jquery.knob.js',
        'lib/wow/wow.min.js',
        'lib/parallax/parallax.js',
        'lib/easing/easing.min.js',
        'lib/nivo-slider/js/jquery.nivo.slider.js',
        'lib/appear/jquery.appear.js',
        'lib/isotope/isotope.pkgd.min.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY',
        'js/contactform.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
