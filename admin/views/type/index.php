<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel pantera\content\admin\models\ContentTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Content Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'key',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a(Html::tag('span', null, [
                            'class' => 'glyphicon glyphicon-trash',
                        ]), $url, [
                            'class' => 'content-ajax-delete',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
