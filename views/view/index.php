<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/18/18
 * Time: 11:00 AM
 */

use pantera\content\models\ContentPage;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model ContentPage */
?>
<h1>
    <?= Yii::$app->seo->getH1() ?>
</h1>
<?php if ($model->media && $model->media->issetMedia()): ?>
    <?= Html::img($model->media->image()) ?>
<?php endif; ?>
<?php if ($model->body): ?>
    <?= $model->body ?>
<?php endif; ?>
