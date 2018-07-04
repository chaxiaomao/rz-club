<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\entity\ActivityLabel */

$this->title = '更新活动标签: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Activity Labels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="content-wrapper">
    <section class="content">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </section>
</div>
