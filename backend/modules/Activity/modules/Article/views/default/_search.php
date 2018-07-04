<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'label_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'limit_count') ?>

    <?= $form->field($model, 'cost_price') ?>

    <?php // echo $form->field($model, 'hold_date') ?>

    <?php // echo $form->field($model, 'cover') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'favor') ?>

    <?php // echo $form->field($model, 'forward') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
