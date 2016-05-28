<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name'=>'Teachin\' Tour',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii'],
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Api',
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
        'setting' => [
            'class' => 'app\modules\setting\settingModules',
        ],
        'location' => [
            'class' => 'app\modules\location\locationModules',
        ],
        'project' => [
            'class' => 'app\modules\project\projectModules',
        ],
        'fee' => [
            'class' => 'app\modules\fee\feeModules',
        ],
        'about' => [
            'class' => 'app\modules\about\aboutModules',
        ],
        'team' => [
            'class' => 'app\modules\team\teamModules',
        ],
        'terms' => [
            'class' => 'app\modules\terms\termsModules',
        ],
        'contact' => [
            'class' => 'app\modules\contact\contactModules',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'mailer' => [
                'sender'                => 'no-reply@teachintour.com',
                'welcomeSubject'        => 'Welcome To Teachin\' Tour',
                'confirmationSubject'   => 'Please verify your Teachin\' Tour account',
                'reconfirmationSubject' => 'Please comfirm your Teachin\' Tour email',
                'recoverySubject'       => 'Recovery Teachin\' Tour account',
            ],
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
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
            'viewPath' => '@app/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailgun.org',
                'username' => 'postmaster@sandbox9fc12c0a66d0405aabd88723ea8edd75.mailgun.org',
                'password' => '9da0a1647a4e5f4537fda529827a6e5b',
                'port' => '587',
                'encryption' => 'tls',
            ],
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

                //user settings URL Management
                'account'=>'user/<controller>/<action>',
                'profile'=>'user/<controller>/<action>',
                'networks'=>'user/<controller>/<action>',
                'login' => 'user/<controller>/<action>',
                'logout' => 'user/<controller>/<action>',
                'register' => 'user/<controller>/<action>',
                'resend' => 'user/<controller>/<action>',
                'request' => 'user/<controller>/<action>',
                'user/<controller:\w+>/<action:\w+>' => 'user/<controller>/<action>',
                'rbac/<controller:\w+>/<action:\w+>' => 'rbac/<controller>/<action>',

                //Location URL Management
                'location/<id:\d+>' => 'location',

                //Project URL Management
                'project/<id:\d+>' => 'project',

                //Setting URL Management
                'setting/<action:\w+>' => 'setting/default/<action>',
                'setting/<action:\w+>/<id:\d+>' => 'setting/default/<action>',
                'setting/<action:\w+>/<page:\w+>' => 'setting/default/<action>',
                'setting/<action:\w+>/<page:\w+>/<id:\d+>' => 'setting/default/<action>',

                //api URL Management
                'api/<module:\w+>/<controller:\w+>/<action:\w+>' => 'api/<module>/<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    // ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
