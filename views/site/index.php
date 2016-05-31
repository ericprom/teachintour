<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = ''.Yii::$app->params["company_name"].' | teaching, learning and discovering the local people';
?>
<section id="slider" class="force-full-screen full-screen">

  <div class="force-full-screen full-screen dark section nopadding nomargin noborder ohidden">

    <div class="container clearfix">
      <div class="slider-caption slider-caption-center">
        <h2 data-animate="fadeInUp">Can you Teach?</h2>
        <p data-animate="fadeInUp" data-delay="200">Get the remarkable experience in Thailand through teaching a local students.</p>
        <a data-animate="fadeInUp" data-delay="600" href="<?=Url::to(['/apply'])?>" class="button button-3d button-teal button-large nobottommargin" style="margin: 30px 0 0 10px;">Apply Now</a>
      </div>
    </div>
    <div class="video-wrap">
      <video poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
        <source src='images/videos/explore.mp4' type='video/mp4' />
        <source src='images/videos/explore.webm' type='video/webm' />
      </video>
      <div class="video-overlay" style="background-color: rgba(0,0,0,0.45);"></div>
    </div>

  </div>

</section>

<!-- Content
============================================= -->
<section id="content" ng-controller="MainController" ng-cloak>

  <div class="content-wrap">
    <div class="promo promo-light promo-full bottommargin-lg header-stick notopborder">
      <div class="container clearfix">
        <h3 class="center">What <span>Volunteers</span> say?</h3>
        <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
          <div class="flexslider">
            <div class="slider-wrap">
              <div class="slide">
                <div class="testi-image">
                  <a href="#"><img src="images/team/eric.png" alt="Customer Testimonails"></a>
                </div>
                <div class="testi-content">
                  <p>teachin' tour Project is one of the project that can change the world.</p>
                  <div class="testi-meta">
                    Eric Prom
                  </div>
                </div>
              </div>
              <div class="slide">
                <div class="testi-image">
                  <a href="#"><img src="images/team/pumpoui.jpg" alt="Customer Testimonails"></a>
                </div>
                <div class="testi-content">
                  <p>Teachin' Tour Project give me my teachin' experience while traveling.</p>
                  <div class="testi-meta">
                    PuMpoui Chankul
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container clearfix">
      <div class="heading-block center">
        <h3><span>teachin' tour</span> Projects</h3>
        <span>You can pick the project that suit your style for remarkable experiences!</span>
      </div>

      <div class="container clearfix">
        <div class="col_one_third bottommargin-lg" ng-repeat="project in Projects">
          <div class="feature-box center media-box fbox-bg">
            <a href="<?=Url::to(['/project'])?>/{{project.id}}">
            <div class="fbox-media">
              <img class="image_fade" src="{{project.cover[1]}}" alt="{{project.title}}">
            </div>
            <div class="fbox-desc">
              <h3>{{project.title}}</h3>
            </div>
            </a>
          </div>
        </div>
        <div class="clear"></div>
        <div class="center">
        <?=Html::a('More projects', ['/project/'],['data' => ['method' => 'post'],'class'=>'button button-border button-rounded button-large']);?>
        </div>
      </div>
    </div>
    <div class="section topmargin-sm footer-stick">
      <div class="heading-block center">
        <h3>What's <span>teachin' tour</span>?</h3>
        <span>We are a language barrier breaking platform where you can be part of a team and find a new way of traveling, discovering an unseen thailand through the local.</span>
      </div>
      <div class="center">
      <?=Html::a('Learn more about us', ['/about/'],['data' => ['method' => 'post'],'class'=>'button button-border button-light button-rounded button-large']);?>
      </div>
    </div>
  </div>

</section><!-- #content end -->
