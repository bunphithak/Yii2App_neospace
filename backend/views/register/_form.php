<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\brand;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
 $messageArray=[
        'sucesssetpass'=>[
            'msg'=>'Register to success',
            'class'=>'alert alert-success'
            ],
        'errorsetpass'=>[
            'msg'=>'Passwords do not match !!',
            'class'=>'alert alert-danger'
          ],
      ];
$this->title = 'Register';
$this->params['breadcrumbs'][] = ['label' => 'Register', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-form">
   
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title); ?></h3>
    </div>
    <div class="panel-body">
         <?php echo Html::beginForm(['register/create'],'post')?>
            <?php if($message!=''){
                        ?>
                    <div role="alert" class="<?= $messageArray[$message]['class']?>">
                            <?=$messageArray[$message]['msg'] ?>
                      </div>
                            <?php
                    } ?>
            <div class="row">
                <div class="col-md-8">
                <label>User Name</label>
                    <?= Html::input('text', 'username', '', ['class' => 'form-control','placeholder'=>'Username']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                <label>Password</label>
                    <?= Html::input('password', 'passwordnumber', '', ['class' => 'form-control','placeholder'=>'Password','style'=>'margin-top: 10px;']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                <label>Password Confirm</label>
                    <?= Html::input('password', 'confirmpassword', '', ['class' => 'form-control','placeholder'=>'Confirmpassword','style'=>'margin-top: 10px;']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">  
                <?= Html::submitButton('Create',['class' => 'btn btn-success','style'=>'margin-top: 10px;']) ?>
                </div>
            </div>

            <?php echo Html:: endForm() ?>
    </div>
</div>
</div>
