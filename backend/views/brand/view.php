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
                <?= Html::a('<i class="glyphicon glyphicon glyphicon-trash btn-xs"></i>Delete', 'javascript:void(0)', ['class'=>'btn btn-danger', 'onclick'=>'setDelete('.$model->FBID.',"'.$model->FBNAME.'")']);?>
                <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>Close', ['index', 'id' => $model->FBID], ['class' => 'btn btn-info']) ?>
            </p>
        </div>
    </div>
</div>
<script type="text/javascript">

function setDelete(id, name=null) {
    swal({
      title: 'Are you sure?',
      text: (name)?name:'No Information',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (data) {
        // after delete
       if(data) {
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                if(data){
                  $.post('<?= Url::to(['brand/delete']) ?>',{id:id},function(response){  });
                }
                window.location.href = '<?= Url::to(['brand/index']) ?>';
            })
        } else {
            console.log('not delete');
        }
    });
}
</script>