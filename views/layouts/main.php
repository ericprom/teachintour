<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$user = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
  <!--[if IE 8]><html class="ie ie8"> <![endif]-->
  <!--[if IE 9]><html class="ie ie9"> <![endif]-->
  <!--[if gt IE 9]><!-->
  <html lang="<?= Yii::$app->language;?>" ng-app="app">
  <!--<![endif]-->
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="teachin, tour, teachin tour, travel, teach, local, thailand" />
    <meta name="description" content="teachin tour - A new way of touring that can help other.">

    <!-- Favicon Generator -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=Yii::$app->request->baseUrl; ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=Yii::$app->request->baseUrl; ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=Yii::$app->request->baseUrl; ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=Yii::$app->request->baseUrl; ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=Yii::$app->request->baseUrl; ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=Yii::$app->request->baseUrl; ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=Yii::$app->request->baseUrl; ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

    <?php
      $controller = Yii::$app->controller;
      $default_controller = Yii::$app->defaultRoute;
      $isFrontpage = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;
      //$menu = $this->context->action->id;
      $menu = $this->context->module->id;
      $transparentHeader = '';
      if ($isFrontpage){
        $transparentHeader = 'class="transparent-header dark full-header"';
      }
      $homeActive='';($menu=='basic')?$homeActive='class="current"':'';
      $locationActive='';($menu=='location')?$locationActive='class="current"':'';
      $projectActive='';($menu=='project')?$projectActive='class="current"':'';
      $feeActive='';($menu=='fee')?$feeActive='class="current"':'';
      $aboutActive='';($menu=='about'||$menu=='team')?$aboutActive='class="current"':'';
      $contactActive='';($menu=='contact')?$contactActive='class="current"':'';
      $loginActive='';($menu=='login')?$loginActive='class="current"':'';
      $registerActive='';($menu=='register')?$registerActive='class="current"':'';
    ?>
  </head>

  <body class="stretched side-panel-left">
  <?php $this->beginBody() ?>
    <div class="body-overlay"></div>
    <div id="side-panel" class="dark">
      <div id="side-panel-trigger-close" class="side-panel-trigger">
        <a href="#"><i class="icon-line-cross"></i></a>
      </div>
      <div class="side-panel-wrap">
        <div class="widget clearfix">
          <?php if(Yii::$app->user->isGuest){?>
          <h4>Teachin' Tour</h4>
          <?php }else{?>
            <?php if(!Yii::$app->user->isGuest){?>
            <h4><?=Html::a($user->username, ['/profile/'],['data' => ['method' => 'get']]);?></h4>
            <?php }?>
          <?php }?>
          <nav class="nav-tree nobottommargin">
            <ul>
              <li class="visible-xs">
                <a href="<?=Url::to(['/'])?>">Home</a>
              </li>
              <li class="visible-xs">
                <a href="<?=Url::to(['/about'])?>">About</a>
              </li>
              <li class="visible-xs">
                <a href="<?=Url::to(['/location'])?>">Locations</a>
              </li>
              <li class="visible-xs">
                <a href="<?=Url::to(['/project'])?>">Projects</a>
              </li>
              <li class="visible-xs">
                <a href="<?=Url::to(['/fee'])?>">Fees</a>
              </li>
              <li class="visible-xs">
                <a href="<?=Url::to(['/contact'])?>">Contact</a>
              </li>
              <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin){?>
              <li>
                <a href="<?=Url::to(['/user/admin/index'])?>">Admin Area</a>
              </li>
              <?php }?>
              <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin || !Yii::$app->user->isGuest && Yii::$app->user->can('Manage')){?>
              <li>
                <a href="<?=Url::to(['/setting'])?>">Settings</a>
              </li>
              <?php }?>
              <?php if(Yii::$app->user->isGuest){?>
              <li>
                <a href="<?=Url::to(['/register'])?>">Register</a>
              </li>
              <li>
                <a href="<?=Url::to(['/login'])?>">Log in</a>
              </li>
              <?php }else{?>
              <li>
                <?=Html::a('Log out', ['/logout/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php }?>
            </ul>
          </nav>

        </div>
      </div>
    </div>
    <!-- Document Wrapper
  ============================================= -->
    <div id="wrapper" class="clearfix">

      <!-- Header
      ============================================= -->
      <header id="header" <?=$transparentHeader?> data-sticky-class="not-dark">

        <div id="header-wrap">

          <div class="container clearfix">
            <!-- Logo
            ============================================= -->
            <div id="logo">
              <a href="<?=Yii::$app->homeUrl;?>" class="standard-logo" data-dark-logo="<?=Yii::$app->request->baseUrl;?>/images/logo-dark.png"><img src="<?=Yii::$app->request->baseUrl;?>/images/logo.png" alt="Teachin' Tour"></a>
              <a href="<?=Yii::$app->homeUrl;?>" class="retina-logo" data-dark-logo="<?=Yii::$app->request->baseUrl;?>/images/logo-dark@2x.png"><img src="<?=Yii::$app->request->baseUrl;?>/images/logo@2x.png" alt="Teachin' Tour"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="style-4">
              <ul>
                <li <?=$homeActive?>>
                  <a href="<?=Url::to(['/'])?>">Home</a>
                </li>
                <li <?=$aboutActive?>>
                  <a href="<?=Url::to(['/about'])?>">About</a>
                </li>
                <li <?=$locationActive;?>>
                  <a href="<?=Url::to(['/location'])?>">Locations</a>
                </li>
                <li <?=$projectActive;?>>
                  <a href="<?=Url::to(['/project'])?>">Projects</a>
                </li>
                <li <?=$feeActive;?>>
                  <a href="<?=Url::to(['/fee'])?>">Fees</a>
                </li>
                <li <?=$contactActive?>>
                  <a href="<?=Url::to(['/contact'])?>">Contact</a>
                </li>
              </ul>
              <div id="side-panel-trigger" class="side-panel-trigger">
                <a href="#"><i class="icon-reorder"></i></a>
              </div>
            </nav><!-- #primary-menu end -->

          </div>

        </div>

      </header><!-- #header end -->
      <!--  -->
      <?= $content ?>
      <toaster-container></toaster-container>
      <!-- Footer
      ============================================= -->
      <footer id="footer" class="dark">

        <div class="container">

          <!-- Footer Widgets
          ============================================= -->
          <div class="footer-widgets-wrap clearfix">
            <div class="row">
              <div class="col-md-3 col-sm-12 col-xs-12">
                <h4>Support</h4>
                <abbr title="Phone Number"><strong>Phone:</strong></abbr>
                <?=Yii::$app->params['contact_number'];?>
                <br>
                <abbr title="Email Address"><strong>Email:</strong></abbr>
                <?=Yii::$app->params['contact_email'];?>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="widget widget_links clearfix">
                  <h4>Company</h4>
                  <ul>
                    <li>
                      <a href="<?=Url::to(['/about'])?>">About</a>
                    </li>
                    <li>
                      <a href="<?=Url::to(['/location'])?>">Locations</a>
                    </li>
                    <li>
                      <a href="<?=Url::to(['/project'])?>">Projects</a>
                    </li>
                    <li>
                      <a href="<?=Url::to(['/fee'])?>">Fees</a>
                    </li>
                    <li>
                      <a href="<?=Url::to(['/contact'])?>">Contact</a>
                    </li>
                    <?php if(Yii::$app->user->isGuest){?>
                    <li>
                      <a href="<?=Url::to(['/register'])?>">Register</a>
                    </li>
                    <?php }?>
                    <li>
                      <a href="<?=Url::to(['/terms'])?>">Terms and condition</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="widget widget_links clearfix">
                  <h4>Follow us</h4>
                  <ul>
                    <li>
                      <a href="https://www.facebook.com/TeachinTour/" target="_blank">Facebook</a>
                    </li>
                    <li>
                      <a href="https://twitter.com/teachintour" target="_blank">Twitter</a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/teachintour/" target="_blank">Instagram</a>
                    </li>
                    <li>
                      <a href="https://www.pinterest.com/teachintour/" target="_blank">Pinterest</a>
                    </li>
                    <li>
                      <a href="https://www.youtube.com/channel/UC7JJcy9L-3dlfmV-q2DtN7g" target="_blank">YouTube</a>
                    </li>
                    <li>
                      <a href="https://www.linkedin.com/in/teachintour" target="_blank">LinkedIn</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
              <h4><?=Yii::$app->params['company_name'];?> Headquarter:</h4>
                <address>
                  <?=Yii::$app->params['contact_address'];?>
                </address>

                © <?=Yii::$app->params['company_name'];?> 2016
              </div>
            </div>
          </div><!-- .footer-widgets-wrap end -->

        </div>
      </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>

