<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
        'about' => [
            'class' => 'app\modules\about\aboutModules',
        ],
        'location' => [
            'class' => 'app\modules\location\locationModules',
        ],
        'package' => [
            'class' => 'app\modules\package\packageModules',
        ],
        'payment' => [
            'class' => 'app\modules\payment\paymentModules',
        ],
        'confirmation' => [
            'class' => 'app\modules\confirmation\confirmationModules',
        ],
        'contact' => [
            'class' => 'app\modules\contact\contactModules',
        ],
        'faq' => [
            'class' => 'app\modules\faq\faqModules',
        ],
        'blog' => [
            'class' => 'app\modules\blog\blogModules',
        ],
        'terms' => [
            'class' => 'app\modules\terms\termsModules',
        ],
        'user' => [
          'class' => 'dektrium\user\Module',
          'enableUnconfirmedLogin' => true,
          'confirmWithin' => 21600,
          'cost' => 12,
          'admins' => ['admin']
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ri,iy9oN0yomiNd6]',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        //     'enableAutoLogin' => true,
        // ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'location/<id:\d+>' => 'location',
                'blog/<id:\d+>' => 'blog',
                'login' => 'user/security/login',
                'logout' => 'user/security/logout',
                'register' => 'user/registration/register',
                // '<module:\w+>/<action:\w+>' => '<module>/default/<action>',
                // '<module:\w+>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
