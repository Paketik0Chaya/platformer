<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'yii2images' => [
        'class' => 'rico\yii2images\Module',
        //be sure, that permissions ok
        //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
        'imagesStorePath' => '@frontend/web/images/store', //path to origin images
        'imagesCachePath' => '@frontend/web/images/cache', //path to resized copies
        'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
        'placeHolderPath' => '@webroot/image/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
    ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

    ],
    'params' => $params,
];
