<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Add New Locations | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Add New <span>Location</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingLocationAddController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>New location</h3>
      </div>
      <div class="col_full nobottommargin">
        <p>Open a new location? Start a new location to make the diffent now.</p>
        <div class="col_two_third">
          <div class="col_full">
            <label for="register-form-name">Location Name:</label>
            <input type="text" class="form-control" ng-model="Location.title"/>
          </div>

          <div class="clear"></div>

          <div class="col_full">
            <label for="register-form-username">Location Description:</label>
            <textarea class="form-control" rows="6" ng-model="Location.detail"></textarea>
          </div>
          <div class="clear"></div>
        </div>
        <div class="col_one_third col_last">
          <label for="register-form-name">Control:</label>
          <div class="well well-lg">
            <div>
              <input id="checkbox-12" class="checkbox-style" type="checkbox"  ng-model="Location.available">
              <label for="checkbox-12" class="checkbox-style-3-label">Available</label>
            </div>
          </div>
        </div>
        <div class="col_full nobottommargin">
          <button class="button button-3d button-black nomargin" ng-click="saveNewLocation()">Save Now</button>
        </div>
      </div>
    </div>
  </div>
</section>
