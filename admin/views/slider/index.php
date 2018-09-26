<?php

use pantera\content\models\ContentSlider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel pantera\content\admin\models\ContentSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-slider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Content Slider', ['create'], [
            'class' => 'btn btn-success',
            'data' => [
                'pjax' => 0,
            ],
        ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            'url',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function (ContentSlider $model) {
                    return Html::tag('span', $model->getCurrentStatus(), [
                        'class' => 'label label-' . ($model->status ? 'success' : 'warning'),
                    ]);
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->getStatusList(), [
                    'class' => 'form-control',
                    'prompt' => '---',
                ]),
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
