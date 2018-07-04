<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '活动';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <section class="content">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('创建活动', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
//                [
//                    'attribute' => 'label_id',
//                    'value' => function($dataProvider) {
//                        //return $dataProvider->labels;
//                        $val = "";
//                        $model = $dataProvider->labels;
//                        foreach ($model as $m) {
//                            $val .= $m->label->name . ",";
//                        }
//                        return $val;
//                    }
//                ],
                'title',
                //'limit_count',
                //'cost_price',
                // 'hold_date',
                // 'cover',
                // 'content:ntext',
                // 'favor',
                // 'forward',
                 [
                     'attribute' => 'status',
                     'value' => function($dataProvider) {
                        return $dataProvider->status == $dataProvider::STATUS_ACTIVE ? "活动进行" : "已经过期";
                     },
                     'contentOptions' => [
                             'align' => 'center'
                     ]
                 ],
                 'created_at',
                 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </section>
</div>
