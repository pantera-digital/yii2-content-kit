<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/26/18
 * Time: 11:22 AM
 */

use pantera\content\models\ContentSlider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $models ContentSlider[] */
?>
<div class="owl-carousel">
    <?php foreach ($models as $model): ?>
        <div class="item">
            <?php
            $img = '';
            if ($model->media && $model->media->issetMedia()) {
                $img = Html::img($model->media->getUrl());
            }
            if ($model->url) {
                echo Html::a($img, $model->url);
            } else {
                echo $img;
            }
            ?>
        </div>
    <?php endforeach; ?>
</div>
