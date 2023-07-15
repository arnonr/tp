<?php
namespace app\theme\eliteadmin;

use yii\base\Exception;
use yii\web\AssetBundle;

class EliteadminAsset extends AssetBundle
{
    public $sourcePath = '@app/theme/eliteadmin/dist';
    public $css = [
        'https://fonts.googleapis.com/css?family=Prompt:300,400,500,600,700',
        'css/style.min.css',
        'css/custom_freedom.css',
    ];
    public $js = [
        'assets/node_modules/popper/popper.min.js',
        'assets/node_modules/bootstrap/dist/js/bootstrap.min.js',
        'js/perfect-scrollbar.jquery.min.js',
        'js/waves.js',
        'js/sidebarmenu.js',
        'js/custom.min.js',
    ];
    public $depends = [
        // 'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        // 'yii\bootstrap\BootstrapPluginAsset',
    ];

}
