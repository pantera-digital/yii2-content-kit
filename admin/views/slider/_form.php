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

    <?= MediaUploadWidgetInnostudio::widget([
        'model' => $model,
        'bucket' => 'media',
        'urlUpload' => ['file-upload', 'id' => $model->id],
        'urlDelete' => ['file-delete'],
        'pluginOptions' => [
            'limit' => 1,
        ],
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
