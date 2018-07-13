<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <section class="content">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                [
                    'attribute' => 'avatar',
                    'format' => 'html',
                    'value' => function ($model) {
                        return '<a class="data-img" data-toggle="modal" data-target="#img-modal" data-id="img-modal" data-avatar="' . $model->avatar . '">' .
                            Html::img($model->avatar) . '</a>';
                    }
                ],
                 'openid',
                // 'mobile',
                // 'sex',
                // 'job',
                // 'age',
                // 'area',
                // 'status',
                 'created_at',
                 'updated_at',

                ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
            ],
        ]); ?>
    </section>

</div>
