<?php

use pantera\content\models\ContentBlock;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model ContentBlock */
?>
<div class="block">
    <?php
    if ($model->url) {
        echo Html::a($model->body, $model->url);
    } else {
        echo $model->body;
    }
    ?>
</div>
