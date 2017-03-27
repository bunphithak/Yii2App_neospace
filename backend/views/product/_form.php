<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\brand;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;



/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-4 col-md-8">
               <?= $form->field($model, 'FPDCODE')->textInput(['maxlength' => true]) ?>
             </div>
          </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-4 col-md-8">
               <?= $form->field($model, 'FPDNAME')->textInput(['maxlength' => true]) ?>
             </div>
          </div>
    </div>
     <div class="row">
        <div class="col-md-12">
             <div class="col-sm-4 col-md-8">
                     <?=$form->field($model,'FPDBRAND')->dropDownList(
                       ArrayHelper::map(brand::find()-> all(),'FBNAME','FBNAME'),
                        ['prompt'=>'Select brand']) ?>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-4 col-md-8">
                   <?= $form->field($model, 'FPDPDF')->widget(FileInput::classname(), [
                      'pluginOptions' => [
                          'class'=>[''],
                          'initialPreview'=>[],
                          'allowedFileExtensions'=>['pdf'],
                          'showPreview' => true,
                          'showRemove' => true,
                          'showUpload' => false,
                       ]
                  ]); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2" style='margin-left: 15px;'>
            <div class="well text-center">
                  <?= Html::img($model->isUpdate($model->FPDIMAGES),['style'=>'width:125px;','class'=>'img-rounded','id'=>'image_upload_preview']);?>
            </div>
        </div>
        <div class="col-md-2">
                  <?= $form->field($model, 'FPDIMAGES')->fileInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-sm-3 form-group">
              <?= $form->field($model, 'FPDACTIVE')->checkbox(['label' => 'ACTIVE' ]);?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
              <div class="col-sm-3 form-group">
                    <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-plus"></i>Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                     <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>Close', ['index'], ['class' => 'btn btn-info']) ?>
              </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$this->registerJS('function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#image_upload_preview").attr("src", e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#product-fpdimages").change(function () {
        readURL(this);
    });');
?>
