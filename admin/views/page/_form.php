<?php

use pantera\content\models\ContentType;
use pantera\media\widgets\innostudio\MediaUploadWidgetInnostudio;
use pantera\seo\widgets\SeoForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->dropDownList(ContentType::getList(), [
        'prompt' => '---',
    ]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= MediaUploadWidgetInnostudio::widget([
        'model' => $model,
        'bucket' => 'media',
        'urlUpload' => ['file-upload', 'id' => $model->id],
        'urlDelete' => ['file-delete'],
        'pluginOptions' => [
            'limit' => 1,
        ],
    ]) ?>

    <?= SeoForm::widget([
        'model' => $model,
        'form' => $form,
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
