<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true ]
    ]); ?>
    <div class=" row ">
        <div class="col-md-12">
            <div class="col-sm-4">
                <?= Html::activeTextInput($model, 'q',['class'=>'form-control','placeholder'=>'search...']) ?>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i> Search</button>
            </div>
         </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>