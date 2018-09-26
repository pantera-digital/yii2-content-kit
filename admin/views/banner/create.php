<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentBanner */

$this->title = 'Create Content Banner';
$this->params['breadcrumbs'][] = ['label' => 'Content Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-banner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
