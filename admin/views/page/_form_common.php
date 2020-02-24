<?php

use dosamigos\ckeditor\CKEditor;
use kartik\widgets\DateTimePicker;
use mihaildev\elfinder\ElFinder;
use pantera\content\models\ContentPage;
use pantera\content\Module;
use pantera\media\widgets\innostudio\MediaUploadWidgetInnostudio;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model ContentPage */
/* @var $form ActiveForm */
?>
<div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?php
        if ($model->editor) {
            echo $form->field($model, 'body')->widget(CKEditor::class, [
                'preset' => 'full',
                'clientOptions' => ElFinder::ckeditorOptions('elfinder', []),
            ]);
        } else {
            echo $form->field($model, 'body')->textarea(['rows' => 20]);
        }
        ?>
        <?= $form->field($model, 'editor')->checkbox() ?>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <?php
        if ($this->context->module->useMedia) {
            echo MediaUploadWidgetInnostudio::widget([
                'model' => $model,
                'bucket' => 'media',
                'urlUpload' => ['file-upload', 'id' => $model->id],
                'urlDelete' => ['file-delete'],
                'pluginOptions' => [
                    'limit' => 1,
                ],
            ]);
        }
        ?>
        <?php
        if ($model->type->is_available_full_page) {
            $hint = Yii::t('content', '{frontpage_slug} to specify the main page', [
                'frontpage_slug' => Module::SLUG_FRONT_PAGE,
            ]);
            echo $form->field($model, 'slug')->hint(Html::encode($hint));
        }
        ?>
        <?= $form->field($model, 'is_favorite')->checkbox() ?>
        <?= $form->field($model, 'created_at')->widget(DateTimePicker::class,[
            'model' => $model,
            'attribute' => 'created_at',
        ]) ?>
    </div>
</div>
