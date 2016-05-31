<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Locations | '.Yii::$app->params["company_name"].'';
?>
<section id="page-title">
  <div class="container clearfix">
    <h1>Locations</h1>
  </div>
</section>
<section id="content" ng-controller="LocationController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="postcontent nobottommargin clearfix">
        <div id="posts">
          <div class="entry clearfix" ng-repeat="location in Locations">
            <div class="entry-image clearfix">
                <a href="<?=Url::to(['/location'])?>/{{location.id}}" data-lightbox="gallery-item">
                <img class="image_fade" src="{{location.cover[1]}}" alt="">
                </a>
            </div>
            <div class="entry-title">
              <h2>
                <a href="<?=Url::to(['/location'])?>/{{location.id}}"  ng-show="get.thumb!=''">
                  {{location.title}}
                </a>
              </h2>
            </div>
            <ul class="entry-meta clearfix">
              <li><i class="icon-folder-open"></i> Teaching</li>
            </ul>
            <div class="entry-content">
              <p>{{location.detail}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar nobottommargin col_last clearfix">
      </div>
    </div>
    <?= $this->render('apply_footer') ?>
  </div>
</section>
