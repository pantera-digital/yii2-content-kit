<?php

use pantera\seo\widgets\SeoForm;
use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="content-page-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php
    if (
        $this->context->module->useSeo &&
        $model->type->is_available_full_page
    ) {
        echo Tabs::widget([
            'items' => [
                [
                    'label' => 'Основное',
                    'content' => $this->render('_form_common', [
                        'form' => $form,
                        'model' => $model,
                    ]),
                ],
                [
                    'label' => 'SEO',
                    'content' => SeoForm::widget([
                        'form' => $form,
                        'model' => $model,
                    ]),
                ],
            ],
        ]);
    } else {
        echo $this->render('_form_common', [
            'form' => $form,
            'model' => $model,
        ]);
    }
    ?>
    <?= $form->field($model, 'status')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('content', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
