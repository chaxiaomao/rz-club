<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\entity\CmsBlock */

$this->title = '更新CMS: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'CMS', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
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
