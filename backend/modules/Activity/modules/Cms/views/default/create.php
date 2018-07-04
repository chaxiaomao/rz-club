<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\entity\CmsBlock */

$this->title = 'Create Cms Block';
$this->params['breadcrumbs'][] = ['label' => 'Cms Blocks', 'url' => ['index']];
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
