<?php

use common\models\entity\ActivityLabel;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SearchActivityLabel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '标签';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <section class="content">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('创建标签', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id',
                    'contentOptions' => [
                        'align' => 'center'
                    ]
                ],
                [
                    'attribute' => 'name',
                    'contentOptions' => [
                        'align' => 'center'
                    ]
                ],
                [
                    'attribute' => 'status',
                    'contentOptions' => [
                        'align' => 'center'
                    ],
                    'value' => function ($dataProvider) {
                        return $dataProvider->status == ActivityLabel::STATUS_ACTIVE ? "正常" : "暂停";
                    }
                ],
                'created_at',
                'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </section>
</div>
