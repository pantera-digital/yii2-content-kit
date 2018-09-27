<?php

use pantera\content\models\ContentPage;
use pantera\content\models\ContentType;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel pantera\content\admin\models\ContentPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Content Page', ['create'], [
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
            'slug',
            [
                'attribute' => 'type_id',
                'value' => 'type.name',
                'filter' => Html::activeDropDownList($searchModel, 'type_id', ContentType::getList(), [
                    'class' => 'form-control',
                    'prompt' => '---',
                ])
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function (ContentPage $model) {
                    return Html::tag('span', $model->getCurrentStatus(), [
                        'class' => 'label label-' . ($model->status ? 'success' : 'warning'),
                    ]);
                },
                'filter' => Html::activeDropDownList($searchModel, 'status', $searchModel->getStatusList(), [
                    'class' => 'form-control',
                    'prompt' => '---',
                ]),
            ],
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
