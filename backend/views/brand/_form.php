<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brand-form">
<div class="row">
    <div class="col-md-12">
        <div class="col-sm-4 col-md-6">
          <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
         </div>
      </div>
</div>
   
<div class="row">
    <div class="col-md-12">
        <div class="col-sm-4 col-md-8">
            <?= $form->field($model, 'FBCODE')->textInput(['maxlength' => true]) ?>
         </div>
      </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-sm-4 col-md-8">
           <?= $form->field($model, 'FBNAME')->textInput(['maxlength' => true]) ?> 
         </div>
      </div>
</div>
 <div class="row">
    <div class="col-md-12">
        <div class="col-sm-2"></div>
         <div class="col-sm-3 form-group">
            <?= Html::submitButton($model->isNewRecord ? '<i class="glyphicon glyphicon-plus"></i>Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>Close', ['index'], ['class' => 'btn btn-info']) ?>
         </div>
    </div>
</div>
   
    <?php ActiveForm::end(); ?>

</div>

