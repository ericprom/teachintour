<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Thanks | '.Yii::$app->params["company_name"].'';
?>
<style>
.payment-title{
  margin-top: 10px;
}
.payment-icon{
  height: 40px;
  padding-left: 10px;  
}
</style>
<div ng-controller="PaymentCompleteController" ng-cloak>
  <section id="page-title" ng-show="hasItem && !isLoading">
    <div class="container clearfix">
      <h1>PAYMENT COMPLETE</h1>
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
        <div class="col_full">
          <div class="error404 center">THANKS</div>
        </div>
      </div>
    </div>
  </section>
</div>
