<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */

$this->title = Yii::t('content', 'Create {NAME}', [
    'NAME' => $model->type->name
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('content', 'Content Pages {NAME}', [
    'NAME' => $model->type->name
]), 'url' => ['index', 'key' => $model->type->key]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
