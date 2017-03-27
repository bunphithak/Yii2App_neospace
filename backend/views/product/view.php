<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii2mod\alert\Alert;
use yii\helpers\Url;




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
                 <?= Html::a('<i class="glyphicon glyphicon glyphicon-trash btn-xs"></i>Delete', 'javascript:void(0)', ['class'=>'btn btn-danger', 'onclick'=>'setDelete('.$model->FPDID.',"'.$model->FPDNAME.'")']);?>
                <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>Close', ['index', 'id' => $model->FPDID], ['class' => 'btn btn-info']) ?>
            </p>
        </div>
    </div>
</div>
<script type="text/javascript">

function setDelete(id, name=null) {
    swal({
      title: 'Delete!',
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
                  $.post('<?= Url::to(['product/delete']) ?>',{id:id},function(response){  });
                }
                window.location.href = '<?= Url::to(['product/index']) ?>';
            })
        } else {
            console.log('not delete');
        }
    });
}
</script>

