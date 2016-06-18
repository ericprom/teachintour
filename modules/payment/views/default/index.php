<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Your Payment | '.Yii::$app->params["company_name"].'';
?>
<div ng-controller="PaymentController" ng-cloak>
  <section id="page-title" ng-show="hasItem && !isLoading">
    <div class="container clearfix">
      <h1>PAYMENT GATEWAY</h1>
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
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">BILLING AMOUNT</h3>
            </div>          
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">PAYMENT DETAILS</h3>
            </div>
            <div class="col_full well">
              <div class="validation-errors"></div>
              <div class="form-group">
                <label for="name">Name on Card</label>
                <input type="text" placeholder="Name on card" class="form-control" ng-model="card.name">
              </div>
              <div class="form-group">
                <label for="cardnumber">Card number</label>
                <input type="text" placeholder="Card Number" class="form-control" ng-model="card.number">
              </div>
              <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8">
                  <label for="expiration">Expiry Date</label>
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">                      
                      <div class="form-group">
                        <input type="text" size="2" maxlength="2" placeholder="MM" class="form-control" ng-model="card.month">
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        <input type="text" size="4" maxlength="4" placeholder="YYYY" class="form-control" ng-model="card.year">
                      </div>
                    </div>
                  </div>

                </div>
                 <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" placeholder="CVV" size="4" maxlength="4" class="form-control" ng-model="card.cvv">
                  </div>
                </div>
              </div>
              <button class="btn btn btn-danger btn-block btn-lg" 
                ng-click="CollectingCards()"
                ng-disabled="card.collecting || card.charging"> Pay Now
              </button> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
