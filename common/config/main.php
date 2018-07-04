<?php
date_default_timezone_set('Asia/Shanghai');
define("IMG_HOST", "http://img-yii2-lte.tunnel.echomod.cn");
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
