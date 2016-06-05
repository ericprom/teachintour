<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'All Applications | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">All <span>Applications</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingProjectController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Applications</h3>
      </div>
      <dev class="row">
        <div class="col-md-4 col-sm-4 portfolio"  ng-repeat="project in Projects">
          <div class="thumbnail">
            <img src="{{project.cover[1]}}" style="display: block;">
            <div class="caption">
              <h4><i ng-class="(project.available)?'icon-eye':'icon-eye-close'"></i> {{project.title}}</h4>
              <a href="<?=Url::to(['/setting/project'])?>/{{project.id}}" class="btn btn-default" role="button">
                <i class="icon-file"></i>
              </a>
              <a href="<?=Url::to(['/setting/project/edit'])?>/{{project.id}}" class="btn btn-default pull-right" role="button">
                <i class="icon-edit"></i>
              </a>
            </div>
          </div>
        </div>
      </dev>
    </div>
  </div>
</div>
