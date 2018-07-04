<?php

namespace backend\modules\Activity\modules\Article\controllers;

use backend\models\form\ActivityForm;
use common\models\entity\ActivityLabel;
use common\models\entity\ActivityLabelRs;
use crazydb\ueditor\UEditorController;
use Yii;
use common\models\entity\Activity;
use common\models\search\ActivitySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Activity model.
 */
class DefaultController extends UEditorController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActivityForm();
        $labels = ActivityLabel::find()->where(['status' => ActivityLabel::STATUS_ACTIVE])->all();
        if (Yii::$app->request->isPost) {
            $file = $_FILES['ActivityForm']['name']['file'];
            if ($file == "") {
                Yii::$app->session->setFlash('error','请去添加封面！');
            } else if ($file != "") {
                if ($model->save()) {
                    Yii::$app->session->setFlash('success','添加成功！');
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'labels' => $labels,
        ]);
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $mode = $this->findModel($id);
        $model = new ActivityForm();
        $model->setAttributes($mode->getAttributes());
        $alRs = new ActivityLabelRs();
        $model->label_id = $alRs->getLabelIds($id);
        $labels = ActivityLabel::find()->where(['status' => ActivityLabel::STATUS_ACTIVE])->all();
        if (Yii::$app->request->isPost) {
            if ($model->update($mode)) {
                Yii::$app->session->setFlash('success','更新成功！');
            }
        }
        return $this->render('update', [
            'model' => $model,
            'labels' => $labels
        ]);
    }

    /**
     * Deletes an existing Activity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
