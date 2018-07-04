<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/9
 * Time: 16:42
 */

namespace frontend\modules\Api\modules\V1\modules\GetHeart\modules\Activity\controllers;
use common\models\entity\Activity;
use common\models\entity\ActivityLabelRs;
use common\rest\statics\OperationResult;
use common\rest\statics\ResponseDatum;
use Yii;
use yii\rest\ActiveController;

class DefaultController extends ActiveController
{

    public $modelClass = 'common\models\entity\Activity';
    public $modelALRs = 'common\models\entity\ActivityLabelRs';

    /**
     * 获取最新活动
     * Renders the index view for the module
     * @return array
     */
    public function actionNewest()
    {
        $status = Yii::$app->request->get("status");
        $model = Activity::find()->where(['status' => $status])->all();
        if (count($model) >= 0) {
            return ResponseDatum::getSuccessDatum(['message' => 'Operation completed successfully!'], $model);
        } else {
            return ResponseDatum::getErrorDatum(['code' => OperationResult::ERROR_404], []);
        }
    }

    public function actionDetail()
    {
        $id = Yii::$app->request->get("id");
        $model = Activity::findOne($id);
        $alRs = new ActivityLabelRs();
        $label = $alRs->getLabels($id); // 获取标签
        $data = array([
            'data' => $model,
            'labels' => $label
        ]);
        if ($data) {
            return ResponseDatum::getSuccessDatum(['message' => 'Operation completed successfully!'], $data);
        } else {
            return ResponseDatum::getErrorDatum(['code' => OperationResult::ERROR_404], []);
        }
    }

}