<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
<style type="text/css">
	.h7{
		font-size: 25px;
		margin-top: -3px;
   		margin-bottom: -2px;
	}
</style>
<div class="user-create">
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
</div>
