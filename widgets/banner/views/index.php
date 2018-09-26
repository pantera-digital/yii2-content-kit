<?php

use pantera\content\models\ContentBanner;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model ContentBanner */
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
