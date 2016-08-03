<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Add New Projects | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Add New <span>Project</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingProjectAddController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>New Project</h3>
      </div>
      <div class="col_full nobottommargin">
        <p>Got new project? Start a new project to make the diffent now.</p>
        <div class="col_two_third">
          <div class="col_full">
            <label for="register-form-name">Project Name:</label>
            <input type="text" class="form-control" ng-model="Project.title"/>
          </div>

          <div class="clear"></div>

          <div class="col_full">
            <label for="register-form-username">Project Description:</label>
            <textarea class="form-control" rows="6" ng-model="Project.detail"></textarea>
          </div>
          <div class="clear"></div>
        </div>
        <div class="col_one_third col_last">
          <label for="register-form-name">Control:</label>
          <div class="well well-lg">
            <div>
              <input id="checkbox-12" class="checkbox-style" type="checkbox"  ng-model="Project.available">
              <label for="checkbox-12" class="checkbox-style-3-label">Available</label>
            </div>
          </div>
        </div>
        <div class="col_full nobottommargin">
          <button class="button button-3d button-black nomargin" ng-click="saveNewProject()">Save Now</button>
        </div>
      </div>
    </div>
  </div>
</div>
