<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

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
                          'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {update} {delete} </div>'
                       ],
                    ],
                ]); ?>
    <?php yii\widgets\Pjax::end() ?>
    </div>
  </div>

</div>
