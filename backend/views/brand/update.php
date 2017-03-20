<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Brand */

$this->title = 'Brand: ' . $model->FBCODE;
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FBCODE, 'url' => ['view', 'id' => $model->FBCODE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style type="text/css">
	.h7{
		font-size: 25px;
		margin-top: -3px;
   		margin-bottom: -2px;
	}
</style>
<div class="brand-update">
<div class="panel panel-success">
	<div class="panel-body">
		<div class="h7"><?= Html::encode($this->title) ?></div>
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
