<?php

/* @var $this \yii\web\View */
/* @var $content string */

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
  <html lang="<?= Yii::$app->language ?>">
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

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?=Yii::$app->request->baseUrl;?>/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title><?= Html::encode($this->title) ?></title>

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
      $feeActive='';($menu=='fees')?$feeActive='class="current"':'';
      $aboutActive='';($menu=='about'||$menu=='team')?$aboutActive='class="current"':'';
      $contactActive='';($menu=='contact')?$contactActive='class="current"':'';
      $loginActive='';($menu=='login')?$loginActive='class="current"':'';
      $registerActive='';($menu=='register')?$registerActive='class="current"':'';
    ?>
  </head>

  <body class="stretched side-panel-left">
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
            <h4><?=Html::a($user->username, ['/profile/'],['data' => ['method' => 'post']]);?></h4>
            <?php }?>
          <?php }?>
          <nav class="nav-tree nobottommargin">
            <ul>
              <li class="visible-xs">
                <?=Html::a('Home', ['//'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('About', ['/about/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('Locations', ['/location/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('Projects', ['/project/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('Fees', ['/fees/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('Contact', ['/contact/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin){?>
              <li>
                <?=Html::a('Admin Area', ['/admin/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php }?>
              <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin || !Yii::$app->user->isGuest && Yii::$app->user->can('Manage')){?>
              <li>
                <?=Html::a('Manage', ['/manage/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php }?>
              <?php if(Yii::$app->user->isGuest){?>
              <li>
                <?=Html::a('Register', ['/register/'],['data' => ['method' => 'post']]);?>
              </li>
              <li>
                <?=Html::a('Log in', ['/login/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php }else{?>
              <li>
                <?=Html::a('Log out', ['/logout/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php }?>
            </ul>
          </nav>

        </div>
<!--
        <div class="widget quick-contact-widget clearfix">

          <h4>Contact Us</h4>
          <div class="quick-contact-form-result"></div>
          <form id="quick-contact-form" name="quick-contact-form" action="<?=Yii::$app->request->baseUrl;?>/include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">
            <div class="form-process"></div>
            <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
            <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
            <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
            <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
            <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-3d nomargin" value="submit">Send Email</button>
          </form>

        </div>
 -->
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
                  <?=Html::a('Home', ['//'],['data' => ['method' => 'post']]);?>
                </li>
                <li <?=$aboutActive?>>
                  <?=Html::a('About', ['/about/'],['data' => ['method' => 'post']]);?>
                </li>
                <li <?=$locationActive;?>>
                  <?=Html::a('Locations', ['/location/'],['data' => ['method' => 'post']]);?>
                </li>
                <li <?=$projectActive;?>>
                  <?=Html::a('Projects', ['/project/'],['data' => ['method' => 'post']]);?>
                </li>
                <li <?=$feeActive;?>>
                  <?=Html::a('Fees', ['/fees/'],['data' => ['method' => 'post']]);?>
                </li>
                <li <?=$contactActive?>>
                  <?=Html::a('Contact', ['/contact/'],['data' => ['method' => 'post']]);?>
                </li>
              </ul>
              <div id="side-panel-trigger" class="side-panel-trigger">
                <a href="#"><i class="icon-reorder"></i></a>
              </div>
            </nav><!-- #primary-menu end -->

          </div>

        </div>

      </header><!-- #header end -->
      <?= $content ?>
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
                      <?=Html::a('About', ['/about/'],['data' => ['method' => 'post']]);?>
                    </li>
                    <li>
                      <?=Html::a('Locations', ['/location/'],['data' => ['method' => 'post']]);?>
                    </li>
                    <li>
                      <?=Html::a('Projects', ['/project/'],['data' => ['method' => 'post']]);?>
                    </li>
                    <li>
                      <?=Html::a('Fees', ['/fees/'],['data' => ['method' => 'post']]);?>
                    </li>
                    <li>
                      <?=Html::a('Contact', ['/contact/'],['data' => ['method' => 'post']]);?>
                    </li>
                    <li>
                      <?=Html::a('Register', ['/register/'],['data' => ['method' => 'post']]);?>
                    </li>
                    <li>
                    <?=Html::a('Terms and condition', ['/terms/'],['data' => ['method' => 'post']]);?>
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

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="<?=Yii::$app->request->baseUrl;?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?=Yii::$app->request->baseUrl;?>/js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript" src="<?=Yii::$app->request->baseUrl;?>/js/functions.js"></script>

  </body>
</html>
<?php $this->endPage() ?>

