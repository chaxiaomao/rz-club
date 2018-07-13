<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/9
 * Time: 16:42
 */
namespace frontend\modules\Api\modules\V1\modules\Rz\controllers;

use common\models\entity\CmsBlock;
use common\rest\statics\ResponseDatum;
use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return array
     */
    public function actionIntroduce() {
        $label = Yii::$app->getRequest()->get("label");
        $model = CmsBlock::find()->where(['label' => $label])->one();
//        var_dump($label);
        if ($model) {
            return ResponseDatum::getSuccessDatum(['message' => 'Operation completed successfully!'], $model);
        } else {
            return ResponseDatum::getErrorDatum(['code' => OperationResult::ERROR_404], []);
        }
    }
}