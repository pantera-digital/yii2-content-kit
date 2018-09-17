<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentType */

$this->title = 'Update Content Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Content Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
