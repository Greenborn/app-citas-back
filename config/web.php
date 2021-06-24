<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7hSF802zvlVYMSbq6E6hQlhCvJ-dQw0C',
            'parsers' => [
               'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'loginUrl' => null,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'chat_room',
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'gender',
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'login',
                'pluralize' => false,
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'change-password',
                'pluralize' => false,
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'profile-image',
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'matches',
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'message',
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'profile',
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'role',
              ],
              [ 'class' => 'yii\rest\UrlRule',
                'controller' => 'user',
              ],
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
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
