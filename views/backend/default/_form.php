<?php

/**
 * Cafedra form view.
 *
 */

use romaten1\univer\Module;
use vova07\fileapi\Widget as FileAPI;
use vova07\imperavi\Widget as Imperavi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin(); ?>
<?php $box->beginBody(); ?>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'title') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'title') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'active')->dropDownList($statusArray) ?>

        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'faculty_id') //->dropDownList($facultyArray) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'image_id')->widget(
                FileAPI::className(),
                [
                    'settings' => [
                        'url' => ['/univer/default/fileapi-upload']
                    ]
                ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'description')->widget(
                Imperavi::className(),
                [
                    'settings' => [
                        'minHeight' => 200,
                        'imageGetJson' => Url::to(['/univer/default/imperavi-get']),
                        'imageUpload' => Url::to(['/univer/default/imperavi-image-upload']),
                        'fileUpload' => Url::to(['/univer/default/imperavi-file-upload'])
                    ]
                ]
            ) ?>
        </div>
    </div>
    
<?php $box->endBody(); ?>
<?php $box->beginFooter(); ?>
<?= Html::submitButton(
    $model->isNewRecord ? Module::t('univer', 'BACKEND_CREATE_SUBMIT') : 
    Module::t('univer', 'BACKEND_UPDATE_SUBMIT'),
    [
        'class' => $model->isNewRecord ? 'btn btn-primary btn-large' : 'btn btn-success btn-large'
    ]
) ?>
<?php $box->endFooter(); ?>
<?php ActiveForm::end(); ?>