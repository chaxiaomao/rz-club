<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\entity\Activity */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '活动详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">

    <div class="content">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'cover',
                    'format' => 'html',
                    'value' => function ($model) {
                        return '<a class="data-img" data-toggle="modal" data-target="#img-modal" data-id="img-modal" data-avatar="' . $model->cover . '">' .
                            Html::img($model->cover) . '</a>';
                    }
                ],
//            'label_id',
                'title',
                'limit_count',
                'cost_price',
                'hold_date',
                [
                    'attribute' => 'content',
                    'format' => 'html',
                    'value' => function ($model) {
                            return Html::decode($model->content);
                    }
                ],
                'favor',
                'forward',
                'status',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>

</div>
