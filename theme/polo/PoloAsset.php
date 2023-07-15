<?php
namespace app\theme\polo;

use yii\base\Exception;
use yii\web\AssetBundle;

class PoloAsset extends AssetBundle
{
    public $sourcePath = '@app/theme/polo/dist';
    public $css = [
        'https://fonts.googleapis.com/css?family=Prompt:300,400,500,600,700',
        'https://fonts.googleapis.com/css?family=Kanit:300,400,500,600,700',
        'https://fonts.googleapis.com/css?family=Sarabun:300,400,500,600,700',
        'https://fonts.googleapis.com/css?family=Mitr:300,400,500,600,700',
        'css/plugins.css',
        'css/style.css',
        'css/custom_fd.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/plugins.js',
        'js/functions.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}