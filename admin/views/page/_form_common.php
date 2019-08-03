<?php

use dosamigos\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use pantera\content\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */
/* @var $form yii\widgets\ActiveForm */
?><div class="row">
    <div class="col-lg-8 col-md-12 col-sm-12">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $model->editor ?

            $form->field($model, 'body')->widget(CKEditor::class, [
                'preset' => 'full',
                'clientOptions' => ElFinder::ckeditorOptions('elfinder', []),
            ])

            : $form->field($model, 'body')->textarea(['rows' => 20]);
        ?>

        <?= $form->field($model, 'editor')->checkbox() ?>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <?= $this->context->module->useMedia ?
        
            \pantera\media\widgets\innostudio\MediaUploadWidgetInnostudio::widget([
                'model' => $model,
                'bucket' => 'media',
                'urlUpload' => ['file-upload', 'id' => $model->id],
                'urlDelete' => ['file-delete'],
                'pluginOptions' => [
                    'limit' => 1,
                ],
            ])

            : ''
        ?>

        <?= $form->field($model, 'slug')->hint(Html::encode(Yii::t('content', '{frontpage_slug} to specify the main page', [
            'frontpage_slug' => Module::SLUG_FRONT_PAGE,
        ]))) ?>

        <?= $form->field($model, 'created_at')->widget(\kartik\widgets\DateTimePicker::className(),[
            'model' => $model,
            'attribute' => 'created_at',
        ]) ?>
    </div>
</div>
