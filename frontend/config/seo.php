<?php
/**
 * Created by PhpStorm.
 * User: CX
 * Date: 2018/3/13
 * Time: 17:56
 */
return [

    [
        'class' => 'yii\rest\UrlRule',
        'extraPatterns' => [// actions
            'GET search' => 'search',
            'POST login' => 'login',
            'POST register' => 'register',
            'POST forget-password'=>'forget-password',
//            'GET dashboard' => 'dashboard',
        ],
        'except' => ['delete', 'create', 'update'],
        'controller' => [
            'api/v1/get-heart/activity' => 'api/v1/get-heart/activity/default',
        ],
    ],

    'api/<action:[\w\-]+>' => 'api/default/<action>',
    'api/<controller:[\w\-]+>/<action:[\w\-]+>' => 'api/<controller>/<action>',
    'api/v1/get-heart/activity/<action:[\w\-]+>' => 'api/v1/get-heart/activity/default/<action>',

];