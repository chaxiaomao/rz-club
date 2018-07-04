<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

Alert::begin([
    'options' => [
        'class' => 'alert-success',
    ],
]);
Alert::end();
?>
<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['10' => '活动', '20' => '停用']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
