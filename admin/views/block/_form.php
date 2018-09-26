<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentBlock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-block-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php
    if ($model->wysiwyg) {
        echo $form->field($model, 'body')->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'full',
        ]);
    } else {
        echo $form->field($model, 'body')->textarea([
            'rows' => 6,
        ]);
    }
    ?>

    <?= $form->field($model, 'wysiwyg')->checkbox() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
