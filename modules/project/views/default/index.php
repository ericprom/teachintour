<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Projects | '.Yii::$app->params["company_name"].'';
?>
<section id="content">

    <div class="content-wrap">

      <div class="container clearfix">
        <div class="heading-block">
          <h2>Volunteer Abroad Projects</h2>
          <span>You can pick the project that suit your style for remarkable experiences</span>
        </div>
        <div class="clear"></div>
      </div>
      <div class="container clearfix">
        <div class="col_one_third bottommargin-lg">
          <div class="feature-box center media-box fbox-bg">
            <div class="fbox-media">
              <a href="#"><img class="image_fade" src="images/project/teachin.png" alt="Image"></a>
            </div>
            <div class="fbox-desc">
              <h3>Teachin' English</h3>
            </div>
          </div>
        </div>
        <div class="col_one_third bottommargin-lg">
          <div class="feature-box center media-box fbox-bg">
            <div class="fbox-media">
              <a href="#"><img class="image_fade" src="images/project/camp.png" alt="Image"></a>
            </div>
            <div class="fbox-desc">
              <h3>Restoration Camp</h3>
            </div>
          </div>
        </div>
        <div class="col_one_third bottommargin-lg col_last">
          <div class="feature-box center media-box fbox-bg">
            <div class="fbox-media">
              <a href="#"><img class="image_fade" src="images/project/care.png" alt="Image"></a>
            </div>
            <div class="fbox-desc">
              <h3>Childcare</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="section topmargin-sm footer-stick">
        <div class="heading-block center">
          <h3><span>Ready</span> to get started?</h3>
          <span>Feel free to contact us for more information or visit us at the office near you.</span>
        </div>
        <div class="center">
        <?=Html::a('Apply Now', ['/apply/'],['data' => ['method' => 'post'],'class'=>'button button-border button-rounded button-large']);?>
        </div>
      </div>
    </div>
  </section><!-- #content end -->
