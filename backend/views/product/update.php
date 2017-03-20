<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = 'Product: ' . $model->FPDCODE;
// $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->FPDCODE, 'url' => ['view', 'id' => $model->FPDCODE]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<style type="text/css">
	.h7{
		font-size: 25px;
		margin-top: -3px;
   		margin-bottom: -2px;
	}
</style>
<div class="product-update">
	<div class="panel panel-success">
		<div class="panel-body">
		    <div class="h7"><?= Html::encode($this->title); ?></div>
		</div>
	</div>
	<div class="panel panel-success">
		<div class="panel-body">
		<?= $this->render('_form', [
        	'model' => $model,
   		]) ?>
		</div>
	</div>
</div>