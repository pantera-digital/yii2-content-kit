<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentSlider */

$this->title = 'Create Content Slider';
$this->params['breadcrumbs'][] = ['label' => 'Content Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
