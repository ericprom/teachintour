<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name'=>'Teachin\' Tour',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii'],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
        'manage' => [
            'class' => 'app\modules\manage\manageModules',
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

                //program URL Management
                '<module:\w+>/<id:\d+>' => '<module>',
                '<module:\w+>/<action:\w+>' => '<module>/default/<action>',
                // '<module:\w+>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',
                // '<module:\w+>/<action:\w+>/<page:\w+>' => '<module>/default/<action>',
                // '<module:\w+>/<action:\w+>/<page:\w+>/<id:\d+>' => '<module>/default/<action>',

                //user settings URL Management
                'account'=>'user/settings/account',
                'profile'=>'user/settings/profile',
                'networks'=>'user/settings/networks',
                'login' => 'user/security/login',
                'logout' => 'user/security/logout',
                'register' => 'user/registration/register',
                'resend' => 'user/registration/resend',
                'request' => 'user/recovery/request',
                'admin' => 'user/admin/index',

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
