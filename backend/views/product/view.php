<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\alert\Alert;




/* @var $this yii\web\View */
/* @var $model backend\models\Product */
$this->title = $model->FPDCODE;
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .h7{
        font-size: 33px;
        margin-top: -3px;
        margin-bottom: -2px;
    }
</style>
<div class="panel panel-success">
    <div class="panel-body">
        <div class="h7"><?= Html::encode($this->title) ?></div>
    </div>
</div>
<div class="product-view">
    <div class="panel panel-success">
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'FPDCODE',
                    'FPDNAME',
                    'FPDBRAND',
                     [
                      
                      'attribute'=>'FPDIMAGES',
                           'value'=>$model->isImage($model->FPDIMAGES),
                           'format' => 'html'
                           
                    ],
                    [
                      
                      'attribute'=>'FPDPDFNAME',
                           'value'=>$model->isfilepdf($model->FPDPDF),
                           'format' => 'raw'
                           
                    ],
             
                ],
                
            ]) ?>

            <p>
         <!--     //Html::a('Test Sweetalert', 'javascript:void(0)', ['id'=>'testsweet', 'class' => 'btn btn-primary', 'onclick'=>'testsweet()'])  -->
                <?= Html::a('Update', ['update', 'id' => $model->FPDID], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->FPDID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('Close', ['index', 'id' => $model->FPDID], ['class' => 'btn btn-info']) ?>
            </p>
        </div>
    </div>
</div>


