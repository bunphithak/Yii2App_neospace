
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'PRODUCT';
// $this->params['breadcrumbs'][] = $this->title;
?>


<div class="product-index">
   <?php yii\widgets\Pjax::begin(['id' => 'grid-brand-pjax','timeout'=>5000]) ?>
 <!-- เรียก view _search.php -->
   <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="panel panel-default">
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
                          [
                            'attribute'=>'FPDCODE',
                            'headerOptions' =>
                                ['class' => 'text-center' ],
                          ],
                          [
                            'attribute'=>'FPDNAME',
                            'headerOptions' =>
                                ['class' => 'text-center' ],
                          ],
                          [
                            'attribute'=>'FPDBRAND',
                            'headerOptions' =>
                                ['class' => 'text-center' ],
                          ],
                          [
                          'attribute'=>'FPDPDF',
                          'format' => 'raw',
                          'headerOptions' => ['class' => 'text-center'],
                          'value' => function($model, $key, $index, $widget) {
                            if(empty($model->FPDPDF)) {
                                return 'NO FILE';
                            } else {
                                return  Html::a('<img src="'.Yii::getAlias('@web').'/images/icon_pdf.png'.'" alt="Smiley face" height="32" width="32">'.$model->FPDPDFNAME, $model->getUploadUrlpdf().$model->FPDPDF, [
                                  'target'=>"_blank", 
                                  'class' => 'text-center',
                                  'data-pjax' => 0

                                ]);
                            }
                          }
                        ],
                         [
                        'attribute'=>'FPDIMAGES',
                        'format' => 'html',
                        'contentOptions' => ['style' => 'width:150px; white-space: normal;','class'=>'text-center'],
                        'headerOptions' => ['class' => 'text-center'],
                        'value' => function($model, $key, $index, $widget) {
                           if(empty($model->FPDIMAGES)) {
                                return 'NO Image';
                          } else {
                            return  Html::img($model->getUploadUrl().$model->FPDIMAGES, ['class' => 'text-center','style'=>'width:150px; height:100px;']);
                          }
                        }
                        ],

                        [
                          'attribute'=>'FPDACTIVE',
                          'filter' => [0 => 'Inactive', 1 => 'Active'],
                          'format' => 'raw',
                          'headerOptions' => ['class' => 'text-center'],
                          'value' => function($model, $key, $index, $column){
                           return $model->FPDACTIVE == 0 ?'<span class="label label-danger text-center">Inactive</span>' : '<span class="label label-success text-center">Active</span>';
                          }
                        ],

                        [
                          'class' => 'yii\grid\ActionColumn',
                          'options'=>['style'=>'width:120px;'],
                           // 'visible' => FALSE,
                          'buttonOptions'=>['class'=>'btn btn-default'],
                          'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>',
                          'buttons'=>[
                            'delete' => function($url,$model,$key){
                                return Html::a('<i class="glyphicon glyphicon glyphicon-trash"></i>','javascript:void(0)',['class'=>'btn btn-default','onclick'=>'setDelete('.$model->FPDID.',"'.$model->FPDNAME.'")']);
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