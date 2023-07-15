<?php
namespace app\theme\eliteadmin;

use yii\base\Exception;
use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $sourcePath = '@app/theme/eliteadmin/dist';
    public $css = [
        'https://fonts.googleapis.com/css?family=Prompt:300,400,500,600,700',
        'css/pages/login-register-lock.css',
        'css/style.min.css',
    ];
    public $js = [
        'assets/node_modules/popper/popper.min.js',
        'assets/node_modules/bootstrap/dist/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}
