<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentSlider */

$this->title = Yii::t('content', 'Update Content Slider: {TITLE}', [
    'TITLE' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('content', 'Content Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('content', 'Update');
?>
<div class="content-slider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
