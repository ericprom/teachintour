<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'All Locations | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">All <span>Locations</span></div>
      <nav>
        <ul>
          <li class="current">
            <a href="<?=Url::to(['/setting/location/add'])?>">
              Create New Location
            </a>
          </li>
        </ul>
      </nav>
    <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingLocationController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>All Locations</h3>
      </div>
      <dev class="row">
        <div class="col-md-4 col-sm-4 portfolio"  ng-repeat="location in Locations">
          <div class="thumbnail">
            <img src="{{location.cover[1]}}" style="display: block;">
            <div class="caption">
              <h4><i ng-class="(location.available)?'icon-eye':'icon-eye-close'"></i> {{location.title}}</h4>
              <a href="<?=Url::to(['/setting/location'])?>/{{location.id}}" class="btn btn-default" role="button">
                <i class="icon-file"></i>
              </a>
              <a href="<?=Url::to(['/setting/location/edit'])?>/{{location.id}}" class="btn btn-default pull-right" role="button">
                <i class="icon-edit"></i>
              </a>
            </div>
          </div>
        </div>
      </dev>
    </div>
  </div>
</div>
