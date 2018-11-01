<?php

use pantera\content\models\ContentPage;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel pantera\content\admin\models\ContentPageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Pages ' . $searchModel->type->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create ' . $searchModel->type->name, ['create', 'key' => $searchModel->type->key], [
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
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, ContentPage $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'key' => $model->type->key, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
