<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Application | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Your <span>Applications</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="ApplicationController" ng-cloak>
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
          <th>Location</th>
          <th>Project</th>
          <th>Fee</th>
          <th>Calendar</th>
          <th class="text-center" width="5%">Status</th>
          <th class="text-center" width="15%">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="application in Applications" ng-class="(application.paid=='true')?'success':''">
            <td class="text-center">{{application.id}}</td>
            <td>{{application.location.title}}</td>
            <td>{{application.project.title}}</td>
            <td>{{(application.fee.title+" ($"+ application.fee.price+")")}}</td>
            <td>{{application.start_date}}</td>
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
              <a href="<?=Url::to(['/application'])?>/{{application.id}}" class="btn btn-info" role="button">
                <i class="icon-file"></i>
              </a>
              <a href="<?=Url::to(['/application/edit'])?>/{{application.id}}" class="btn btn-default" role="button" ng-show="application.approval=='false'">
                <i class="icon-edit"></i>
              </a>
              <button class="btn btn-default" role="button" ng-show="application.approval=='true'" disabled>
                <i class="icon-edit"></i>
              </button>
              <button class="btn btn-danger" ng-click="confirmDelete(application)" ng-disabled="application.paid=='true'">
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

  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="margin-top: 200px;">
              <div class="modal-header">
                  <i class="icon-trash"></i>  <b>Application removal</b>
              </div>
              <div class="modal-body">
                  Do you want to delete this application?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success btn-ok" ng-click="deleteNow()">Confirm</a>
              </div>
          </div>
      </div>
  </div>
</div>
