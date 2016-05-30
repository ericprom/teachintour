<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Projects | '.Yii::$app->params["company_name"].'';
?>
<section id="content" ng-controller="ProjectController" ng-cloak>
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="heading-block">
          <h2>Volunteer Abroad Projects</h2>
          <span>You can pick the project that suit your style for remarkable experiences</span>
        </div>
        <div class="clear"></div>
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
