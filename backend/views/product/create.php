<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
// $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
	.h7{
		font-size: 33px;
		margin-top: -3px;
   		margin-bottom: -2px;
	}
</style>
<div class="product-create">
	<div class="panel panel-success">
		<div class="panel-body">
		    <div class="h7"><?= $this->title = 'Create Product';?></div>
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
