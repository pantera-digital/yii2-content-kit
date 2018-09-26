<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentBlock */

$this->title = 'Create Content Block';
$this->params['breadcrumbs'][] = ['label' => 'Content Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-block-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
