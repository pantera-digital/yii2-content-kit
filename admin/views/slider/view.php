<?php

use pantera\content\models\ContentSlider;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentSlider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('content', 'Content Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('content', 'Update'), ['update', 'id' => $model->id], [
            'class' => 'btn btn-primary'
        ]) ?>
        <?= Html::a(Yii::t('content', 'Delete'), ['delete', 'id' => $model->id], [
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
            'url',
            'sort',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => Html::tag('span', $model->getCurrentStatus(), [
                    'class' => 'label label-' . ($model->status ? 'success' : 'warning'),
                ]),
            ],
            [
                'label' => Yii::t('content', 'Image'),
                'format' => 'raw',
                'value' => function (ContentSlider $model) {
                    if ($model->media && $model->media->issetMedia()) {
                        return Html::img($model->media->image());
                    }
                },
            ],
            [
                'label' => Yii::t('content', 'Image small'),
                'format' => 'raw',
                'value' => function (ContentSlider $model) {
                    if ($model->mediaSmall && $model->mediaSmall->issetMedia()) {
                        return Html::img($model->mediaSmall->image());
                    }
                },
            ],
        ],
    ]) ?>

</div>
