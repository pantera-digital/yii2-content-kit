<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model pantera\content\models\ContentPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $this->context->module->useSeo ?

        Tabs::widget([
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
                    'content' => \pantera\seo\widgets\SeoForm::widget([
                        'form' => $form,
                        'model' => $model,
                    ]),
                ],
            ],
        ])

        : $this->render('_form_common', [
            'form' => $form,
            'model' => $model,
        ])
    ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('content', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
