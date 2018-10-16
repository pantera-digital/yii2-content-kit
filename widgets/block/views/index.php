<?php

use pantera\content\models\ContentBlock;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model ContentBlock */
echo Html::tag('div', $model->body, [
    'class' => 'block',
]);
