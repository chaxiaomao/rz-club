<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\entity\ActivityLabel */

$this->title = '添加标签';
$this->params['breadcrumbs'][] = ['label' => '添加标签', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <section class="content">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </section>
</div>
