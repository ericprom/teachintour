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

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

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
      $menu = $this->context->action->id;
      $match = 'request,reset,connect,register,resend,login,account,networks,profile,confirm';
      $transparentHeader = 'class="transparent-header dark full-header"';
      if (preg_match('/'.$menu.'/',$match)){
        $transparentHeader = '';
      }
      $homeActive='';($menu=='index')?$homeActive='class="current"':'';
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
            <h4><?=$user->username;?></h4>
          <?php }?>
          <nav class="nav-tree nobottommargin">
            <ul>
              <?php if(Yii::$app->user->isGuest){?>
              <li class="visible-xs">
                <?=Html::a('Home', ['/login/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('Locations', ['/login/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('Projects', ['/login/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('Fees', ['/login/'],['data' => ['method' => 'post']]);?>
              </li>
              <li class="visible-xs">
                <?=Html::a('About Us', ['/login/'],['data' => ['method' => 'post']]);?>
              </li>
              <li <?=$registerActive?>>
                <?=Html::a('Register', ['/register/'],['data' => ['method' => 'post']]);?>
              </li>
              <li <?=$loginActive?>>
                <?=Html::a('Log in', ['/login/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php }else{?>
              <li>
                <?=Html::a('Edit Profile', ['/profile/'],['data' => ['method' => 'post']]);?>
              </li>
              <li>
                <?=Html::a('Log out', ['/logout/'],['data' => ['method' => 'post']]);?>
              </li>
              <?php }?>
            </ul>
          </nav>

        </div>

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
                  <?=Html::a('Home', ['/login/'],['data' => ['method' => 'post']]);?>
                </li>
                <li>
                  <?=Html::a('Locations', ['/login/'],['data' => ['method' => 'post']]);?>
                </li>
                <li>
                  <?=Html::a('Projects', ['/login/'],['data' => ['method' => 'post']]);?>
                </li>
                <li>
                  <?=Html::a('Fees', ['/login/'],['data' => ['method' => 'post']]);?>
                </li>
                <li>
                  <?=Html::a('About Us', ['/login/'],['data' => ['method' => 'post']]);?>
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

            <div class="col_two_third">

              <div class="col_one_third">

                <div class="widget clearfix">

                  <img src="<?=Yii::$app->request->baseUrl;?>/images/footer-widget-logo.png" alt="" class="footer-logo">

                  <p>Breaking <strong>Language</strong> Barrier</p>

                  <div style="background: url('<?=Yii::$app->request->baseUrl;?>/images/world-map.png') no-repeat center center; background-size: 100%;">
                    <address>
                      <strong><?=Yii::$app->params['company_name'];?> Headquarters:</strong><br>
                      <?=Yii::$app->params['contact_address'];?>
                    </address>
                    <abbr title="Phone Number"><strong>Phone:</strong></abbr>
                    <?=Yii::$app->params['contact_number'];?><br>
                    <abbr title="Email Address"><strong>Email:</strong></abbr>
                    <?=Yii::$app->params['contact_email'];?>
                  </div>

                </div>

              </div>

              <div class="col_one_third">
                <div class="widget widget_links clearfix">
                  <h4>Site map</h4>
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
              </div>
              <div class="col_one_third col_last">
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
            </div>

            <div class="col_one_third col_last">
              <div class="widget subscribe-widget clearfix">
                <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                <div class="widget-subscribe-form-result"></div>
                <form id="widget-subscribe-form" action="<?=Yii::$app->request->baseUrl;?>/include/subscribe.php" role="form" method="post" class="nobottommargin">
                  <div class="input-group divcenter">
                    <span class="input-group-addon"><i class="icon-email2"></i></span>
                    <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                    <span class="input-group-btn">
                      <button class="btn btn-success" type="submit">Subscribe</button>
                    </span>
                  </div>
                </form>

              </div>

              <div class="widget clearfix" style="margin-bottom: -20px;">

                <div class="row">

                  <div class="col-md-6 clearfix bottommargin-sm">
                    <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                      <i class="icon-facebook"></i>
                      <i class="icon-facebook"></i>
                    </a>
                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                  </div>
                  <div class="col-md-6 clearfix">
                    <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                      <i class="icon-rss"></i>
                      <i class="icon-rss"></i>
                    </a>
                    <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
                  </div>

                </div>

              </div>

            </div>

          </div><!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

          <div class="container clearfix">

            <div class="col_half">
              Copyrights &copy; 2016 All Rights Reserved by <?=Yii::$app->params['company_name'];?>
            </div>

            <div class="col_half col_last tright">
              <div class="fright clearfix">
                <a href="https://www.facebook.com/TeachinTour/" class="social-icon si-small si-borderless si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>

                <a href="https://twitter.com/teachintour" class="social-icon si-small si-borderless si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>

                <a href="https://www.instagram.com/teachintour/" class="social-icon si-small si-borderless si-instagram">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                </a>

                <a href="https://www.pinterest.com/teachintour/" class="social-icon si-small si-borderless si-pinterest">
                  <i class="icon-pinterest"></i>
                  <i class="icon-pinterest"></i>
                </a>

                <a href="https://www.youtube.com/channel/UC7JJcy9L-3dlfmV-q2DtN7g" class="social-icon si-small si-borderless si-youtube">
                  <i class="icon-youtube"></i>
                  <i class="icon-youtube"></i>
                </a>
                <a href="https://www.linkedin.com/in/teachintour" class="social-icon si-small si-borderless si-linkedin">
                  <i class="icon-linkedin"></i>
                  <i class="icon-linkedin"></i>
                </a>
              </div>

              <div class="clear"></div>
            </div>

          </div>

        </div><!-- #copyrights end -->

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

