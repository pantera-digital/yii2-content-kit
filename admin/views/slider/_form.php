<?php

use pantera\media\widgets\innostudio\MediaUploadWidgetInnostudio;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentSlider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'row_1')->textarea(['rows' => 7]) ?>

    <?= $form->field($model, 'row_2')->textarea(['rows' => 7]) ?>

    <?= $form->field($model, 'row_3')->textarea(['rows' => 7]) ?>

    <?= MediaUploadWidgetInnostudio::widget([
        'model' => $model,
        'bucket' => 'media',
        'urlUpload' => ['file-upload', 'id' => $model->id],
        'urlDelete' => ['file-delete'],
        'pluginOptions' => [
            'limit' => 1,
        ],
    ]) ?>

    <?= MediaUploadWidgetInnostudio::widget([
        'model' => $model,
        'bucket' => 'mediaSmall',
        'urlUpload' => ['file-upload', 'id' => $model->id],
        'urlDelete' => ['file-delete'],
        'pluginOptions' => [
            'limit' => 1,
        ],
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('content', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
