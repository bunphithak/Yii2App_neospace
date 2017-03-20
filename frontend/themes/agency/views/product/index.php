<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PRODUCT';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">
       <h1><?= Html::encode($this->title) ?></h1>
         <?php yii\widgets\Pjax::begin(['id' => 'grid-brand-pjax','timeout'=>5000]) ?>
       <!-- เรียก view _search.php -->
         <?php echo $this->render('_search', ['model' => $searchModel]); ?>

       
<?= GridView::widget([
                'id'=>'grid-brand',
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                 'class' => 'table table-bordered  table-striped table-hover',
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                        'FPDCODE',
                        'FPDNAME',
                        'FPDBRAND',
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
                            'data-pjax' => 0,
                            'style' => 'color: black'

                          ]);
                      }
                    }
                    ],
                    [
                    'attribute'=>'FPDIMAGES',
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'width:150px; white-space: normal;','class'=>'text-center'],
                    'headerOptions' => ['class' => 'text-center'],
                    'value' => function($model, $key, $index, $widget) {
                       if(empty($model->FPDIMAGES)) {
                            return 'NO Image';
                      } else {
                        return  Html::a( Html::img($model->getUploadUrl().$model->FPDIMAGES, ['class' => 'text-center','style'=>'width:150px; height:100px;']), $model->getUploadUrl().$model->FPDIMAGES, 
                          [
                            'data-fancybox'=>'gallery', 
                          ]);
                      }
                    }
                    ],
                    [
                      'class' => 'yii\grid\ActionColumn',
                      'options'=>['style'=>'width:120px;'],
                       'visible' => FALSE,
                      'buttonOptions'=>['class'=>'btn btn-default'],
                      'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
                   ],
                ],
            ]); ?>
<?php yii\widgets\Pjax::end() ?>