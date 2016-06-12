<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Location Detail | '.Yii::$app->params["company_name"].'';
?>
<section id="content" ng-controller="LocationDetailController" ng-cloak>
  <section id="page-title" ng-show="hasItem && !isLoading">
    <div class="container clearfix">
      <h1>Namsom, Udonthani</h1>
    </div>
  </section>
  <section id="content">
    <div class="content-wrap" ng-show="!hasItem && !isLoading">
      <div class="container clearfix">
        <div class="col_full">
          <div class="error404 center">404</div>
        </div>
      </div>
    </div>
    <div class="content-wrap" ng-show="hasItem && !isLoading">
      <div class="container clearfix">
        <div class="postcontent nobottommargin clearfix">
          <div class="single-post nobottommargin">
            <div class="entry clearfix">
              <div class="entry-image">
                <img src="{{Location.cover[1]}}" alt="{{Location.title}}">
              </div>
              <div class="fancy-title title-bottom-border">
                <h2>Details</h2>
              </div>
              <div class="entry-content notopmargin">
                <p>{{Location.detail}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="sidebar nobottommargin col_last clearfix">
          <div class="panel panel-default events-meta">
            <div class="panel-heading">
              <h3 class="panel-title">At a glance:</h3>
            </div>
            <div class="panel-body">
              <ul class="portfolio-meta bottommargin iconlist">
                <li><i class="icon-check"></i> Available year-round</li>
                <li><i class="icon-check"></i> Homestay</li>
                <li><i class="icon-check"></i> Airport pick-up</li>
                <li><i class="icon-check"></i> Orientation</li>
                <li><i class="icon-check"></i> Accommodation</li>
                <li><i class="icon-check"></i> 3 Meals/Day</li>
                <li><i class="icon-check"></i> Program fees from $250 for 1 week</li>
                <li><i class="icon-check"></i> A special 1 week volunteer program is available</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
      <?= $this->render('apply_footer') ?>
    </div>
  </section>
</section>
