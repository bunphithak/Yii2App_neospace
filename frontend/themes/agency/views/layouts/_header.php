   <!-- Navigation -->
   <style type="text/css">
     
          .navbar-default2 {
              border-color: transparent;
              background-color: #222;
          }

          .navbar-default2 .navbar-brand {
              font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
              color: #fed136;
          }

          .navbar-default2 .navbar-brand:hover,
          .navbar-default2 .navbar-brand:focus,
          .navbar-default2 .navbar-brand:active,
          .navbar-default2 .navbar-brand.active {
              color: #fec503;
          }

          .navbar-default2 .navbar-collapse {
              border-color: rgba(255,255,255,.02);
          }

          .navbar-default2 .navbar-toggle {
              border-color: #fed136;
              background-color: #fed136;
          }

          .navbar-default2 .navbar-toggle .icon-bar {
              background-color: #fff;
          }

          .navbar-default2 .navbar-toggle:hover,
          .navbar-default2 .navbar-toggle:focus {
              background-color: #fed136;
          }

          .navbar-default2 .nav li a {
              text-transform: uppercase;
              font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
              font-weight: 400;
              letter-spacing: 1px;
              color: #fff;
          }

          .navbar-default2 .nav li a:hover,
          .navbar-default2 .nav li a:focus {
              outline: 0;
              color: #fed136;
          }

          .navbar-default2 .navbar-nav>.active>a {
              border-radius: 0;
              color: #fff;
              background-color: #fed136;
          }

          .navbar-default2 .navbar-nav>.active>a:hover,
          .navbar-default2 .navbar-nav>.active>a:focus {
              color: #fff;
              background-color: #fec503;
          }

          @media(min-width:768px) {
              .navbar-default2 {
                  padding: 16px 0;
                  border: 0;
                  background-color: #222;
                  -webkit-transition: padding .3s;
                  -moz-transition: padding .3s;
                  transition: padding .3s;
              }

              .navbar-default2 .navbar-brand {
                  font-size: 2em;
                  -webkit-transition: all .3s;
                  -moz-transition: all .3s;
                  transition: all .3s;
              }

              .navbar-default2 .navbar-nav>.active>a {
                  border-radius: 3px;
              }

              .navbar-default2.navbar-shrink {
                  padding: 10px 0;
                  background-color: #222;
              }

              .navbar-default2.navbar-shrink .navbar-brand {
                  font-size: 1.5em;
              }
          }
          .logo{ 
            margin-top: -17px;width: 11em;
          }
          .logo2{ 
            margin-top: -23px;width: 10em;
          }
   </style>
   <?php
   use yii\helpers\Url;
   use yii\helpers\Html;
   use yii\bootstrap\Nav;
   use yii\bootstrap\NavBar;
   use yii\helpers\ArrayHelper;
    $class = !isset($class)?'':$class;
    if(Yii::$app->layout == 'homepage'){
        $menus = [
        //['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'neospace', 'url' =>'#homespage1','linkOptions'=>['class'=>'page-scroll']],

            ['label' => 'about', 'url' =>'#about-neospace','linkOptions'=>['class'=>'page-scroll']],

            ['label' => 'components', 'url' =>'#components','linkOptions'=>['class'=>'page-scroll']],

            ['label' => 'line card', 'url' =>'#portfolio','linkOptions'=>['class'=>'page-scroll']],

            ['label' => 'Product', 'items'=>[
                ['label' => 'product quality','class'=>'dropdown-menu-product','url' => ['/site/product_quality']],
                ['label' => 'product','class'=>'dropdown-menu-product','url' => Url::to(['product/index'])],
            ]],
            ['label' => 'contact us', 'url' =>'#contact','linkOptions'=>['class'=>'page-scroll']],
        ];  
    }else{
          $menus = [
        // ['label' => 'Home', 'url' => ['/site/index']],
          
            ['label' => 'neospace', 'url' =>Url::to(['site/index','#' => 'homespage']),'linkOptions'=>['class'=>'page-scroll']],
        
            ['label' => 'about', 'url' =>Url::to(['site/index','#' => 'about-neospace']),'linkOptions'=>['class'=>'page-scroll']],
           
            ['label' => 'components', 'url' =>Url::to(['site/index','#' => 'components']),'linkOptions'=>['class'=>'page-scroll']],

            ['label' => 'line card', 'url' =>Url::to(['site/index','#' => 'portfolio']),'linkOptions'=>['class'=>'page-scroll']],
            ['label' => 'Product', 'items'=>[
                ['label' => 'product quality','class'=>'dropdown-menu-product','url' => ['/site/product_quality']],
                ['label' => 'product','class'=>'dropdown-menu-product','url' => ['/product/index']],
            ]],
        
             ['label' => 'contact us', 'url' =>Url::to(['site/index','#' => 'contact']),'linkOptions'=>['class'=>'page-scroll']],
        ];
    }
   ?>
<?php
    if(isset($lang)){
      $nav = 'navbar navbar-default2 navbar-fixed-top';
      $logo = 'logo2'; 
    } else {
      $nav = 'navbar navbar-default navbar-fixed-top ';
      $logo = 'logo';
    }
    $options = ['navbar','navbar-default','navbar-fixed-top'];
    NavBar::begin([
        'brandLabel' => Html::img('@image_path/neospace_logo.png',['width'=>'160', 'class'=>$logo],['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
       'brandOptions'=>[
            'class'=>'navbar-header page-scroll'
        ],
        'options' => [
            'class' => $nav.$class,
        ],
    ]);
   echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>ArrayHelper::merge($menus,
           [
         /* 
          ['label' => 'Product', 'items'=>[
                ['label' => 'product quality', 'url' => ['/site/about']],
                ['label' => 'product', 'url' => ['/site/contact']],
            ]],
           /* Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],*/
        ]),
    ]);
    NavBar::end();
?>
