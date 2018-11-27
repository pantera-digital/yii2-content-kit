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
<div class="owl-carousel content-slider">
    <?php foreach ($models as $model) : ?>
        <div class="item content-slider__item">
            <?php
                if ($model->url) {
                    echo Html::beginTag('a', [
                        'href' => $model->url,
                    ]);
                }
            ?>
            <?php
            $img = '';
            if ($model->media && $model->media->issetMedia()) {
                $img = Html::img($model->media->getUrl());
            }
            echo $img;
            ?>
            <?php if ($model->row_1 || $model->row_2 || $model->row_3) : ?>
                <div class="content-slider__item-content">
                    <?php
                    if ($model->row_1) {
                        echo Html::tag('div', $model->row_1, [
                            'class' => 'content-slider__item-row content-slider__item-row--1',
                        ]);
                    }
                    if ($model->row_2) {
                        echo Html::tag('div', $model->row_2, [
                            'class' => 'content-slider__item-row content-slider__item-row--2',
                        ]);
                    }
                    if ($model->row_3) {
                        echo Html::tag('div', $model->row_3, [
                            'class' => 'content-slider__item-row content-slider__item-row--3',
                        ]);
                    }
                    ?>
                </div>
            <?php endif; ?>
            <?php
                if ($model->url) {
                    echo Html::endTag('a');
                }
            ?>
        </div>
    <?php endforeach; ?>
</div>
