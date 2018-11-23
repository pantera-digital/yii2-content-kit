<?php

use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use pantera\content\Module;
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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->hint(Html::encode(Yii::t('content', '{SLUG} to specify the main page', [
        'SLUG' => Module::SLUG_FRONT_PAGE,
    ]))) ?>

    <?php
    if ($model->editor) {
        echo $form->field($model, 'body')->widget(CKEditor::className(), [
            'preset' => 'full',
            'clientOptions' => ElFinder::ckeditorOptions('elfinder', []),
        ]);
    } else {
        echo $form->field($model, 'body')->textarea(['rows' => 20]);
    }
    ?>

    <?= $form->field($model, 'editor')->checkbox() ?>

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
        <?= Html::submitButton(Yii::t('content', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
