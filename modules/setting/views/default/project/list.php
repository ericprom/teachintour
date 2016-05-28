<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'All Projects | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">All <span>Projects</span></div>
      <nav>
        <ul>
          <li class="current">
            <a href="<?=Url::to(['/setting/project/add'])?>">
              Create New Projrct
            </a>
          </li>
        </ul>
      </nav>
    <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingProjectController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>All Projects</h3>
      </div>
      <div id="posts" class="events small-thumbs">
        <div class="entry clearfix" ng-repeat="project in Projects">
          <div class="entry-image hidden-sm">
            <img src="../images/project/teachin.png" alt="">
          </div>
          <div class="entry-c">
            <div class="entry-title">
              <h2>{{project.title}}</h2>
            </div>
            <ul class="entry-meta clearfix">
              <li>
                <span class="label label-success" ng-show="project.available">Active</span>
                <span class="label label-danger" ng-show="!project.available">Deactive</span>
              </li>
            </ul>
            <div class="entry-content">
              <a href="<?=Url::to(['/setting/project'])?>/{{project.id}}" class="btn btn-default"><i class="icon-eye"></i> Preview</a>
              <a href="<?=Url::to(['/setting/project/edit'])?>/{{project.id}}" class="btn btn-danger"><i class="icon-edit"></i> Edit</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
