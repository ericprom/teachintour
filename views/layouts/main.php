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
    <title><?= Html::encode($this->title) ?></title>

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

    <?= Html::csrfMetaTags() ?>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- CSS -->
    <link href="<?=Yii::$app->request->baseUrl; ?>/css/base.css" rel="stylesheet">
    <link href="<?=Yii::$app->request->baseUrl; ?>/css/jquery.switch.css" rel="stylesheet">
    <link href="<?=Yii::$app->request->baseUrl; ?>/css/date_time_picker.css" rel="stylesheet">
    <link href="<?=Yii::$app->request->baseUrl; ?>/css/blog.css" rel="stylesheet">

     <!-- Google web fonts -->
   <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <script>paceOptions = {ajax: {trackMethods: ['GET', 'POST']}};</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/orange/pace-theme-minimal.css" rel="stylesheet" />

  </head>
  <body>
    <!--[if lte IE 8]>
      <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->

    <div id="preloader">
      <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
      </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3">
            <div id="logo">
              <a href="<?=Yii::$app->homeUrl;?>">
                <img src="<?=Yii::$app->request->baseUrl; ?>/img/logo.png" height="34" alt="City tours" data-retina="true" class="logo_normal">
              </a>
              <a href="<?=Yii::$app->homeUrl;?>">
                <img src="<?=Yii::$app->request->baseUrl; ?>/img/logo_sticky.png" height="34" alt="City tours" data-retina="true" class="logo_sticky">
              </a>
            </div>
          </div>
          <nav class="col-md-9 col-sm-9 col-xs-9">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
              <div class="main-menu">
                <div id="header_menu">
                    <img src="<?=Yii::$app->request->baseUrl; ?>/img/logo_sticky.png" height="34" alt="City tours" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                <ul>
                  <li class="submenu">
                    <a href="<?=Yii::$app->homeUrl;?>" class="show-submenu">Home</a>
                  </li>
                  <li class="submenu">
                    <?=Html::a('About us', ['/about/'],['data' => ['method' => 'post']]);?>
                  </li>
                  <li class="submenu">
                    <?=Html::a('Locations', ['/location/'],['data' => ['method' => 'post']]);?>
                  </li>
                  <li class="submenu">
                    <?=Html::a('Packages', ['/package/'],['data' => ['method' => 'post']]);?>
                  </li>
                  <li class="submenu">
                    <?=Html::a('Contact us', ['/contact/'],['data' => ['method' => 'post']]);?>
                  </li>
                </ul>
              </div><!-- End main-menu -->
              <ul id="top_tools">
                <?php if(Yii::$app->user->isGuest){?>
                <li>
                  <?=Html::a('<i class="icon-user"></i> Register', ['/register/'],['data' => ['method' => 'post']]);?>
                </li>
                <li>
                  <?=Html::a('<i class="icon-login"></i> Log in', ['/login/'],['data' => ['method' => 'post']]);?>
                </li>
                <?php }else{?>
                  <li>
                    <div class="dropdown dropdown-search">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $user->username ?></a>
                        <div class="dropdown-menu">
                          <ul>
                            <li>
                            <?=Html::a('<i class="icon-cog"></i> Edit Profile', ['/profile/'],['data' => ['method' => 'post']]);?>
                            </li>
                            <li>
                            <?=Html::a('<i class="icon-logout"></i> Log out', ['/logout/'],['data' => ['method' => 'post']]);?>
                            </li>
                          </ul>
                        </div>
                    </div>
                  </li>
                <?php }?>
            </ul>
          </nav>
        </div>
      </div><!-- container -->
    </header><!-- End Header -->

    <?= $content ?>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-3">
            <h3>Support</h3>
            <a href="tel://<?=Yii::$app->params['contact_number'];?>" id="phone"><?=Yii::$app->params['contact_number'];?></a>
            <a href="mailto:<?=Yii::$app->params['contact_email'];?>" id="email_footer"><?=Yii::$app->params['contact_email'];?></a>
            <strong>Secure payments with</strong>
            <p><img src="img/payments.png" width="231" height="30" alt="" data-retina="true" class="img-responsive"></p>
          </div>
          <div class="col-md-3 col-sm-3">
            <h3>Company</h3>
            <ul>
              <li>
                <?=Html::a('About us', ['/about/'],['data' => ['method' => 'post']]);?>
              </li>
              <li>
                <?=Html::a('FAQs', ['/faq/'],['data' => ['method' => 'post']]);?>
              </li>
              <li>
                <?=Html::a('Blog', ['/blog/'],['data' => ['method' => 'post']]);?>
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
          <div class="col-md-3 col-sm-3">
            <h3>Follow us</h3>
            <ul>
                <li>
                  <a href="https://www.facebook.com/TeachinTour/" target="_blank">
                  <i class="icon-facebook"></i> Facebook
                </a>
                </li>
                <li>
                  <a href="https://twitter.com/teachintour" target="_blank">
                  <i class="icon-twitter"></i> Twitter
                </a>
                </li>
                <li>
                  <a href="https://www.instagram.com/teachintour/" target="_blank">
                  <i class="icon-instagram"></i> Instagram
                </a>
                </li>
                <li>
                  <a href="https://www.pinterest.com/teachintour/" target="_blank">
                  <i class="icon-pinterest"></i> Pinterest
                </a>
                </li>
                <li>
                  <a href="https://www.youtube.com/channel/UC7JJcy9L-3dlfmV-q2DtN7g" target="_blank">
                  <i class="icon-youtube-play"></i> YouTube
                </a>
                </li>
                <li>
                  <a href="https://www.linkedin.com/in/teachintour" target="_blank">
                  <i class="icon-linkedin"></i> LinkedIn
                </a>
                </li>
              </ul>
          </div>
          <div class="col-md-2 col-sm-3">
            <h3><?=Yii::$app->params['company_name'];?></h3>
            <?=Yii::$app->params['contact_address'];?>
            <br>
            <p>© <?=Yii::$app->params['company_name'];?> 2015</p>
          </div>
        </div><!-- End row -->
      </div><!-- End container -->
    </footer><!-- End footer -->

    <div id="toTop"></div><!-- Back to top button -->

    <!-- Jquery -->
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/jquery-1.11.2.min.js"></script>
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/common_scripts_min.js"></script>
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/functions.js"></script>

    <!-- video header -->
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/modernizr.js"></script>
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/video_header.js"></script>

    <script>
    $(document).ready(function() {

       HeaderVideo.init({
          container: $('.header-video'),
          header: $('.header-video--media'),
          videoTrigger: $("#video-trigger"),
          autoPlayVideo: false
        });

    });
    </script>

    <!-- Text rotate -->
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/morphext.min.js"></script>
    <script>
    $("#js-rotating").Morphext({
        animation: "fadeIn", // Overrides default "bounceIn"
        separator: ",", // Overrides default ","
        speed: 2000, // Overrides default 2000
        complete: function () {
            // Overrides default empty function
        }
    });
    </script>

    <!-- Google Map -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/map_contact.js"></script>
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/infobox.js"></script>


    <!-- Date and time pickers -->
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/datepicker_advanced.js"></script>

    <!-- Fixed sidebar -->
    <script src="<?=Yii::$app->request->baseUrl; ?>/js/theia-sticky-sidebar.js"></script>
    <script>
        jQuery('#sidebar').theiaStickySidebar({
          additionalMarginTop: 80
        });
    </script>
    <script>
    $(document).ready(function() {
      'use strict';
      $('#faq_box a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 120
            }, 500);
            return false;
          }
        }
      });

    });
    </script>

  </body>
</html>
<?php $this->endPage() ?>

