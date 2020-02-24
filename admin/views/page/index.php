<?php

use pantera\content\admin\models\ContentPageSearch;
use pantera\content\models\ContentPage;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel ContentPageSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = Yii::t('content', 'Content Pages {NAME}', [
    'NAME' => $searchModel->type->name
]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a(Yii::t('content', 'Create {NAME}', [
                'NAME' => $searchModel->type->name
        ]), ['create', 'key' => $searchModel->type->key], [
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
            [
                'attribute' => 'slug',
                'visible' => $searchModel->type->is_available_full_page,
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
            [
                'attribute' => 'is_favorite',
                'value' => function (ContentPage $model) {
                    return $model->getFavoriteLabel();
                },
                'filter' => Html::activeDropDownList($searchModel, 'is_favorite', $searchModel->getFavoriteLabels(), [
                    'class' => 'form-control',
                    'prompt' => '---',
                ]),
            ],
            'created_at:datetime',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ContentPage $model) {
                    return Url::toRoute([$action, 'key' => $model->type->key, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
