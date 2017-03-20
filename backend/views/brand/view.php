<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Brand */

 

$this->title = $model->FBCODE;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .h7{
        font-size: 25px;
        margin-top: -3px;
        margin-bottom: -2px;
    }
</style>
<div class="brand-view">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="h7"><?= Html::encode($this->title) ?></div>
        </div>
    </div>
    <div class="panel panel-default">
            <div class="panel-body">
                <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'FBCODE',
                'FBNAME',
                ],
            ]) ?>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->FBID], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->FBID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('Close', ['index', 'id' => $model->FBID], ['class' => 'btn btn-info']) ?>
            </p>
           <?= Html::a('delete', 'javascript:void(0)', ['class'=>'btn btn-info glyphicon glyphicon-ok btn-xs', 'onclick'=>'setDelete('.$model->FBID.')']);?>
            
        </div>
    </div>
</div>
<script type="text/javascript">

function setDelete(id) {
    swal({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (data) {
        if(data){
            $.post('<?= Url::to(['brand/delete']) ?>',{id:id},function(datadelete){
                console.log(datadelete);
            });
        }
    })
}
</script>