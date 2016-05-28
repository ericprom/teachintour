<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Update Pricing | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Update <span>Pricing</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingFeeEditController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Update Pricing</h3>
      </div>
      <div class="col_full">
        <p>Flexible costing? Update pricing to make the diffent now.</p>
        <div class="col_two_third">
          <div class="col_full">
            <div class="col_one_third">
              <label for="register-form-name">Title:</label>
              <input type="text" class="form-control" ng-model="Fee.title">
            </div>
            <div class="col_one_third">
              <label for="register-form-name">Price:</label>
              <div class="input-group">
                <input type="text" class="form-control" ng-model="Fee.price">
                <span class="input-group-addon">฿</span>
              </div>
            </div>
            <div class="col_one_third col_last">
              <label for="register-form-name">Promotion:</label>
              <div class="input-group">
                <input type="text" class="form-control" ng-model="promotion">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button" ng-click="addPromotion(promotion)">Add!</button>
                </span>
              </div>
            </div>
          </div>
          <div class="col_full">
            <label for="register-form-name" ng-show="Promotions.length>0">Promotion:</label>
            <div class="tagcloud">
              <ul class="list-group col_half">
                <li class="list-group-item" ng-repeat="promotion in Promotions">
                  <span class="badge" ng-click="removePromotion(promotion)" style="cursor:pointer;">Remove</span>
                  {{promotion.title}}
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col_one_third col_last">
          <label for="register-form-name">Control:</label>
          <div class="well well-lg">
            <div>
              <input id="checkbox-10" class="checkbox-style" type="checkbox" ng-model="Fee.popular">
              <label for="checkbox-10" class="checkbox-style-3-label">Most Popular</label>
            </div>
            <div>
              <input id="checkbox-11" class="checkbox-style" type="checkbox" ng-model="Fee.shelf">
              <label for="checkbox-11" class="checkbox-style-3-label">Top Shelf</label>
            </div>
            <div>
              <input id="checkbox-12" class="checkbox-style" type="checkbox"  ng-model="Fee.available">
              <label for="checkbox-12" class="checkbox-style-3-label">Available</label>
            </div>
          </div>
        </div>
        <div class="line"></div>
        <div class="col_full nobottommargin">
          <button class="button button-3d button-black nomargin" ng-click="updateNewPrice()">Update Now</button>
          <button class="button button-3d button-red nomargin pull-right" ng-click="deleteNewPrice()">Delete Now</button>
        </div>
      </div>
    </div>
  </div>
</section>
