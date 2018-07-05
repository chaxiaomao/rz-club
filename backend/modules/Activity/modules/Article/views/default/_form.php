<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



if( Yii::$app->getSession()->hasFlash('success') ) {
    Alert::begin([
        'options' => [
            'class' => 'alert-success',
        ],
    ]);
    Alert::end();
}
if( Yii::$app->getSession()->hasFlash('error') ) {
    Alert::begin([
        'options' => [
            'class' => 'alert-error',
        ],
    ]);
    Alert::end();
}

$css = '
    label input[type=checkbox]{
        -moz-transform:scale(1.4);    
        -ms-transform:scale(1.4);     
        -webkit-transform:scale(1.4); 
        -o-transform:scale(1.4);
    }
    label {
        margin-right:10px;
    }
';
$this->registerCss($css)
?>

<div class="activity-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
        ]
    ]); ?>

    <?= $form->field($model, 'label_id')->checkboxList(\yii\helpers\ArrayHelper::map($labels, "id", "name")) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'limit_count')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hold_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hold_date')->widget(\kartik\datetime\DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd hh:ii::ss',
        ]
    ]); ?>

    <p></p>

    <?php
    echo '<img id="cover" src="' . $model->cover . '" />'
    ?>

    <div style="display: none">
        <?= $form->field($model, 'cover')->textInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true, 'id' => 'cover_inp']) ?>

    <?= \crazydb\ueditor\UEditor::widget([
        'model' => $model,
        'attribute' => 'content',
    ]) ?>

    <?= $form->field($model, 'favor')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'forward')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'status')->dropDownList(['10' => '活动进行', '20' => '已经过期']) ?>

    <div class="form-group">
        <?= Html::submitButton("保存", ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    document.getElementById('cover_inp').onchange = function () {
        var imgFile = this.files[0];
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById('cover').src = fr.result;
        };
        fr.readAsDataURL(imgFile);
    };
</script>