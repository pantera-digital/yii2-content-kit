<?php

use pantera\content\models\ContentBlock;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel pantera\content\admin\models\ContentBlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-block-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Content Block', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            'position',
            'url',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function (ContentBlock $model) {
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
