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
<section id="content" ng-controller="SettingApplicationController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Applications</h3>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered nobottommargin">
        <thead>
          <tr>
          <th class="text-center">#</th>
          <th>Applicant</th>
          <th>Location</th>
          <th>Project</th>
          <th>Fee</th>
          <th class="text-center" width="5%">Status</th>
          <th class="text-center" width="15%">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="application in Applications">
            <td class="text-center">{{$index+1}}</td>
            <td>{{(application.firstname+" "+application.lastname)}}</td>
            <td>{{application.location.title}}</td>
            <td>{{application.project.title}}</td>
            <td>{{(application.fee.title+" ($"+ application.fee.price+")")}}</td>
            <td class="text-center">
              <span ng-show="application.approvedAt==null">
                <i class="icon-clock text-warning"></i>
              </span>
              <span ng-show="application.approvedAt!=null && application.approval=='true'">
                <i class="icon-thumbs-up text-success"></i>
              </span>
              <span ng-show="application.approvedAt!=null && application.approval=='false'">
                <i class="icon-thumbs-down text-danger"></i>
              </span>
            </td>
            <td class="text-center">
              <a href="<?=Url::to(['/setting/application'])?>/{{application.id}}" class="btn btn-info" role="button">
                <i class="icon-file"></i>
              </a>
              <button class="btn btn-danger">
                <i class="icon-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
        </table>
      </div>
      <br>
      <div class="text-center" ng-hide="total<=10 || skip>=total">
        <a class="button button-border button-rounded button-large" ng-click="loadMoreItem()">
        <i class="icon-spin5" ng-show="processing"></i>
        <span ng-hide="processing">Load More...</span>
        </a>
      </div>
    </div>
  </div>
</div>
