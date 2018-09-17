<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */

$this->title = 'Create Content Page';
$this->params['breadcrumbs'][] = ['label' => 'Content Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
