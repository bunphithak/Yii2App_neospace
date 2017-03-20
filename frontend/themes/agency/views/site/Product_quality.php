<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;

$this->title = 'Product quality';
$this->params['breadcrumbs'][] = $this->title;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@agency/dist');
$this->registerJsFile($directoryAsset.'/js/cbpAnimatedHeader.min.js');
?>
 <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading product_qu_font"><?= Html::encode($this->title) ?></h2>
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4 product_qu_font">
            <p class="text-muted centers-contact text-indent">At the heart of NEOSPACE , we are commitment to total customer
                satisfaction with a foundation in a secure quality system. With state-of-the art
                equipment and experienced industry experts, NEOSPACE is committed to fulfilling the 
                quality needs of our customers.</p>
        </div>
        <div class="col-md-4 product_qu_font">
            <p class="text-muted centers-contact text-indent">
                We ensure the quality of our inventory before a part even reaches the 
                NEOSPACE warehouse through a strict qualification process. Because of our 
                dedication to quality ,we are able to offer long time warranty on all components 
                sold. We have the confidence in our inventory and inspection process, that if any part sold by 
                NEOSPACE fails within warranty time we will replace or refund .
            </p>
        </div>
        <div class="col-md-4 product_qu_font">
            <p class="text-muted centers-contact text-indent">
                We currently stock some components from 500 manufacturers, including many exclusive 
                authorized lines. Our global sources components worldwide 24 hours a day to secure 
                hard-to-find and allocated parts. We have combined the best of both worlds
                – traits from both the independent and franchise space to meet the growing demand of 
                our customers. With some components in stock – including an emphasis on allocated, 
                obsolete and hard-to-find parts, we believe in getting you what you need, when you need it.
            </p>
        </div>
    </div>
</div>