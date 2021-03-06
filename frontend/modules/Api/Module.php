<?php
/**
 * Created by PhpStorm.
 * User: CX
 * Date: 2018/3/15
 * Time: 10:38
 */

namespace frontend\modules\Api;


use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\Api\controllers';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        Yii::$app->user->enableSession = false;
        $this->modules = [
            'v1' => ['class' => 'frontend\modules\Api\modules\V1\Module'],
        ];
    }
}