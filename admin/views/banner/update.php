<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentBanner */

$this->title = 'Update Content Banner: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Content Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-banner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
