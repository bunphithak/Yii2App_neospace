<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'PRODUCT';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true ]
    ]); ?>
    
        <div class="panel panel-info" style="margin-top: 25px;">
            <div class="panel-heading">
                <h2 class="panel-title"><?= Html::encode($this->title) ?></h2>
            </div>
            <div class="panel-body">
                <div class=" row ">
                    <div class="col-md-12">
                        <div class="col-sm-10">
                            <?= Html::activeTextInput($model, 'q',['class'=>'form-control','placeholder'=>'Search...']) ?>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-search"></i>Search</button>
                        </div>
                         <div class="col-sm-1 form-group">
                            <?= Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>