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
class LightBootstrapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.min.css',
        'css/light-bootstrap-dashboard.css',
        'css/pe-icon-7-stroke.css',
        'http://fonts.googleapis.com/css?family=Roboto:400,700,300',
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
