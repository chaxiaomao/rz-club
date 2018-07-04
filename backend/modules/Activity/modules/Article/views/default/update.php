<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\entity\Activity */

$this->title = '更新活动: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '活动', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="content-wrapper">
    <section class="content">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
            'labels' => $labels
        ]) ?>
    </section>
</div>
