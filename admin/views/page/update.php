<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */

$this->title = 'Update Content Page: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Content Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
