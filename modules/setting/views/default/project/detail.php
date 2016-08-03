<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Preview Project | '.Yii::$app->params["company_name"].'';
?>
<div ng-controller="SettingProjectDetailController" ng-cloak>
  <section id="page-title" ng-show="hasItem && !isLoading">
    <div class="container clearfix">
      <h1>PREVIEW: {{Project.title}}</h1>
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
        <div class="single-event">
          <div class="col_three_fourth">
            <div class="entry-image">
              <a href="#"><img src="{{Project.cover[1]}}" alt="{{Project.title}}"></a>
            </div>

            <div class="clear"></div>

            <div>
              <div class="fancy-title title-bottom-border">
                <h3>Details</h3>
              </div>
              <p>{{Project.detail}}</p>



              <h4><i class="icon-users"></i>  Who?</h4>
              <p>If you are a native English speakers, you are qualified. No background in teaching needed.</p>

              <h4><i class="icon-map-marker"></i> Where?</h4>
              <p>Right now, Namsom, Udonthani is the only place that we offered.</p>

              <h4><i class="icon-calendar"></i> When?</h4>
              <p>Available all year round.</p>

            </div>
          </div>
          <div class="col_one_fourth col_last">
            <div class="panel panel-default events-meta">
              <div class="panel-heading">
                <h3 class="panel-title">Available Locations:</h3>
              </div>
              <div class="panel-body">
                <ul class="iconlist">
                  <li><i class="icon-map-marker"></i>Namsom, Udonthani</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
