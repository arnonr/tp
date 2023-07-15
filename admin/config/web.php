<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'th_TH',
    'defaultRoute' => 'news/index',
    'name'=>'TGDE Website',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'mdate' => [
            'class' => 'app\components\Mdate',
        ],
        'mdoc' => [
            'class' => 'app\components\Mdoc',
        ],
        'mpic' => [
            'class' => 'app\components\Mpic',
        ],
        'mhelpers' => [
            'class' => 'app\components\Mhelpers',
        ],
        //EDIT
        'view' => [
            'theme' => [
                'basePath' => '@app/theme/eliteadmin',
                'baseUrl' => '@app/theme/eliteadmin',
                'pathMap' => [
                    '@app/views' => '@app/theme/eliteadmin/views',
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web/theme/eliteadmin/dist/',
                    'js' => [
                        'assets/node_modules/jquery/jquery-3.2.1.min.js',
                    ],
                    'jsOptions' => [ 'position' => \yii\web\View::POS_HEAD],
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'c95yThvw4cA8Jd1GjrXSoy3SQEwm-woi',
            'parsers' => [
                'application/json' => 'yii/web/JsonParser',
            ],
            'enableCsrfCookie' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'arnon.r@tgde.kmutnb.ac.th',
                'password' => '7529@tgde',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\UserIdentity',
            'enableAutoLogin' => false,
            'enableSession' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            // 'rules' => [
            //     array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
            // ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    //     // uncomment the following to add your IP if you are not connecting from localhost.
    //     //'allowedIPs' => ['127.0.0.1', '::1'],
    // ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
