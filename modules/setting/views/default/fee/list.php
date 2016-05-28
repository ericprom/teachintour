<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Program Fees | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Program <span>Fees</span></div>
      <nav>
        <ul>
          <li class="current">
            <a href="<?=Url::to(['/setting/fee/add'])?>">
              Add New Pricing
            </a>
          </li>
        </ul>
      </nav>
    <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingFeeController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Program Fees</h3>
      </div>
      <div class="pricing-box pricing-extended bottommargin clearfix" ng-repeat="fee in Fees">
        <div class="pricing-desc">
          <div class="pricing-title">
            <h3>
              <i class="icon-star" ng-show="fee.popular"></i>
              <i class="icon-tag" ng-show="fee.shelf"></i>
              {{fee.title}}
            </h3>
          </div>
          <div class="pricing-features">
            <ul class="clearfix">
              <li ng-repeat="detail in fee.detail"><i class="icon-check"></i>{{detail.title}}</li>
            </ul>
          </div>
        </div>
        <div class="pricing-action-area">
          <div class="pricing-meta">
            Cost
          </div>
          <div class="pricing-price">
            <span class="price-unit">฿</span>{{fee.price}}
          </div>
          <div class="pricing-action">
            <a href="<?=Url::to(['/setting/fee/edit'])?>/{{fee.id}}" class="button button-3d button-xlarge btn-block nomargin">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
