<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Brand */

$this->title = 'Create Brand';
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
	.h7{
		font-size: 33px;
		margin-top: -3px;
   		margin-bottom: -2px;
	}
</style>
<div class="brand-create">
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

