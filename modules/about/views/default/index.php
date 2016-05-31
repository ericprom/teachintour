<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'About | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">About<span> Teachin' Tour</span></div>
      <nav>
        <ul>
          <li class="current"><?=Html::a('About', ['/about/'],['data' => ['method' => 'post']]);?></li>
          <li><?=Html::a('Teams', ['/team/'],['data' => ['method' => 'post']]);?></li>
        </ul>
      </nav>
    <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
    </div>
  </div>
</div>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="col_full">
        <div class="heading-block nobottomborder">
          <h2>Breaking language barrier.</h2>
          <span>English is one of the most spoken language, but Thailand have their own language. The language spoken in the Central Plains of the Kingdom is the standard Thai taught in all schools, broadcast over radio and TV, and printed in publications. The difficult time comes when one has to communicate with the world. We believe that breaking the language barrier will open the world to local people.</span>
        </div>

        <div class="fslider" data-pagi="false" data-animation="fade">
          <div class="flexslider">
            <div class="slider-wrap">
              <div class="slide"><img src="<?=Yii::$app->request->baseUrl; ?>/images/about/teachin_monk.jpg" ></div>
            </div>
          </div>
        </div>

      </div>
      <div class="clear"></div>

      <div class="promo promo-light bottommargin">
        <div class="heading-block center nobottomborder">
          <h3>Our Vision</h3>
          <h3><span>"Breaking the language barrier and Openning the world to local people."</span></h3>
        </div>
      </div>

      <div class="heading-block center">
        <h2>Our <span>Goals </span></h2>
        <p>Without you we can't break the barrier</p>
      </div>
      <div class="col_one_third">
        <div class="feature-box fbox-center fbox-bg fbox-light fbox-effect">
          <div class="fbox-icon">
            <i>1</i>
          </div>
          <h3>+100 Schools<span class="subtitle">We are trying to help more than one hundred schools all over Thailand.</span></h3>
        </div>
      </div>

      <div class="col_one_third">
        <div class="feature-box fbox-center fbox-bg fbox-light fbox-effect">
          <div class="fbox-icon">
            <i>2</i>
          </div>
          <h3>+100K Students<span class="subtitle">We are hoping to see more than one hundred thounsand students be able to speak English.</span></h3>
        </div>
      </div>

      <div class="col_one_third col_last">
        <div class="feature-box fbox-center fbox-bg fbox-light fbox-effect">
          <div class="fbox-icon">
            <i>3</i>
          </div>
          <h3>+ 1000 Volunteers<span class="subtitle">We are hoping to invite more than a thounsand volunteers to help us breaking the barreir.</span></h3>
        </div>
      </div>
    </div>
    <?= $this->render('apply_footer') ?>
  </div>
</section>
