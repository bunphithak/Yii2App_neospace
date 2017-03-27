<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Brands';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="brand-index">

       <h1><?= Html::encode($this->title) ?></h1>
         <?php yii\widgets\Pjax::begin(['id' => 'grid-brand-pjax','timeout'=>5000]) ?>
       <!-- เรียก view _search.php -->
         <?php echo $this->render('_search', ['model' => $searchModel]); ?>
  <div class="panel panel-info">
    <div class="panel-body">       
      <?= GridView::widget([
                    'id'=>'grid-brand',
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'tableOptions' => [
                     'class' => 'table table-bordered  table-striped table-hover',
                    ],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'FBCODE',
                        'FBNAME',
                        [
                          'class' => 'yii\grid\ActionColumn',
                          'options'=>['style'=>'width:120px;'],
                           // 'visible' => FALSE,
                          'buttonOptions'=>['class'=>'btn btn-default'],
                          'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                          'buttons'=>[
                            'delete' => function($url,$model,$key){
                                return Html::a('<i class="glyphicon glyphicon glyphicon-trash"></i>','javascript:void(0)',['class'=>'btn btn-default','onclick'=>'setDelete('.$model->FBID.',"'.$model->FBNAME.'")']);
                              }
                          ]
                        ],
                    ],
                ]); ?>
    <?php yii\widgets\Pjax::end() ?>
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