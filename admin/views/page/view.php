<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('content', 'Content Pages {NAME}', [
    'NAME' => $model->type->name
]), 'url' => ['index', 'key' => $model->type->key]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('content', 'Update'), [
            'update',
            'key' => $model->type->key,
            'id' => $model->id
        ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('content', 'Delete'), ['delete', 'key' => $model->type->key, 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'slug',
            'body:html',
            'type.name',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => Html::tag('span', $model->getCurrentStatus(), [
                    'class' => 'label label-' . ($model->status ? 'success' : 'warning'),
                ]),
            ],
            'created_at',
        ],
    ]) ?>

</div>
