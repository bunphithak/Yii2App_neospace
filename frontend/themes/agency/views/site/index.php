   <?php

    Yii::$app->layout='homepage';

   $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@agency/dist');
   ?>
   <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">Welcome To Our neospace (s) ple.,ltd</div>
                <div class="intro-lead-in">It's Nice To Meet You</div>
                <a href="#homespage1" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div>
    </header>
    <?= $this->render('_homespage.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_about-neospace.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_components.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_line.php',['directoryAsset'=>$directoryAsset ]) ?>
    <?= $this->render('_contact.php',['directoryAsset'=>$directoryAsset ]) ?>
 
  