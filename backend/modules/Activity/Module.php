<?php

namespace backend\modules\Activity;

/**
 * activity module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\Activity\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'article' => ['class' => 'backend\modules\Activity\modules\Article\Module'],
            'label' => ['class' => 'backend\modules\Activity\modules\Label\Module'],
            'cms' => ['class' => 'backend\modules\Activity\modules\Cms\Module']
        ];
    }
}
