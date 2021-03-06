<?php

namespace frontend\assets;

use yii\web\View;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BaseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css',
    ];

    public $js = [
        'js/jquery.scrollUp.min.js',
        'js/price-range.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.cookie.js',
        'js/jquery.accordion.js',
        'js/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];


}
