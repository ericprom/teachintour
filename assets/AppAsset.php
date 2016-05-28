<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/bootstrap.css',
      'css/style.css',
      'css/swiper.css',
      'css/dark.css',
      'css/font-icons.css',
      'css/animate.css',
      'css/magnific-popup.css',
      'css/responsive.css',
      'css/components/radio-checkbox.css'
    ];

    public $js = [
        'js/jquery.js',
        'js/plugins.js',
        'js/functions.js',
        'js/apps.js',
        'js/controllers.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'app\assets\BowerAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
