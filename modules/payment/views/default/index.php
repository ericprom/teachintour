<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Your Payment | '.Yii::$app->params["company_name"].'';
?>
<style>
.payment-title{
  margin-top: 10px;
}
.payment-icon{
  height: 40px;
  padding-left: 10px;  
}
.payment-box{
  height:209.5px;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
<div ng-controller="PaymentController" ng-cloak>
  <section id="page-title" ng-show="hasItem && !isLoading">
    <div class="container clearfix">
      <h1 ng-show="isComplete">PAYMENT COMPLETE</h1>
    </div>
  </section>
  <section id="content">
    <div class="content-wrap" ng-show="!hasItem && !isLoading && !isComplete">
      <div class="container clearfix">
        <div class="col_full">
          <div class="error404 center">404</div>
        </div>
      </div>
    </div>
    <div class="content-wrap" ng-show="hasItem && !isLoading && isComplete">
      <div class="container clearfix">
        <div class="col_full">
          <div class="error404 center">THANKS</div>
        </div>
      </div>
    </div>
    <div class="content-wrap" ng-show="hasItem && !isLoading && !isComplete">
      <div class="container clearfix">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">BILLING AMOUNT</h3>
            </div>  
            <div class="col_full">
              <label for="payment-form-application">Select Billing<span class="text-danger">*</span></label>
              <select class="selectpicker form-control" id="payment-form-application" 
              ng-options='(application.project.title+" at "+application.location.title+" ($"+application.fee.price+")") for application in Applications'
              ng-change="paymentApplication(payment.data)" 
              ng-model="payment.data">
              </select>
            </div>   
            <div class="col_full well payment-box" ng-show="payment.amount">
              <h2>฿{{payment.amount*36 | number}}</h2>
            </div>  
            <div class="row" ng-show="payment.amount">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <h5 style="margin-top: 15px;">
                  <span class="text-danger">*</span>
                  We payment total is USD {{payment.amount | number}}. Your actual payment will be submitted as THB {{payment.amount*36 | number}} based on recent exchange rates.
                </h5>
              </div>
            </div>   
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">PAYMENT DETAILS</h3>
            </div>
            <div class="col_full well">
              <div class="form-group">
                <label for="name">Name on Card</label>
                <input type="text" placeholder="Name on card" class="form-control" ng-model="card.name"  ng-disabled="payment.collecting || payment.charging || processing">
              </div>
              <div class="form-group">
                <label for="cardnumber">Card number</label>
                <input type="text" placeholder="Card Number" class="form-control" ng-model="card.number"  ng-disabled="payment.collecting || payment.charging || processing" maxlength="16">
              </div>
              <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8">
                  <label for="expiration">Expiry Date</label>
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">                      
                      <div class="form-group">
                        <input type="text" size="2" maxlength="2" placeholder="MM" class="form-control" ng-model="card.month" ng-disabled="payment.collecting || payment.charging || processing">
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group">
                        <input type="text" size="4" maxlength="4" placeholder="YYYY" class="form-control" ng-model="card.year" ng-disabled="payment.collecting || payment.charging || processing">
                      </div>
                    </div>
                  </div>

                </div>
                 <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" placeholder="CVV" size="4" maxlength="4" class="form-control" ng-model="card.cvv" ng-disabled="payment.collecting || payment.charging || processing">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div>
                  <input id="checkbox-12" class="checkbox-style" type="checkbox"  ng-model="payment.agreement">
                  <label for="checkbox-12" class="checkbox-style-3-label">CLICK TO ACCEPT <a ng-click="acceptPaymentPolicy()">PAYMENT POLICY</a></label>
                </div>
                  <button class="btn btn btn-danger btn-block btn-lg" 
                    ng-click="PreCollectingCards()"
                    ng-disabled="!payment.amount || payment.collecting || payment.charging || !payment.agreement">
                    <i ng-class="(payment.collecting || payment.charging || processing)?'icon-cog icon-spin':''"></i> Pay Now
                  </button> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12">
                <h5 style="margin-top: 15px;">Secure Card Payment via Omise</h5>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-126">
                <table class="pull-right ">
                  <tr>
                    <td>
                      <img src="<?=Yii::$app->request->baseUrl;?>/images/payments/omise.png" alt="Omise Logo" class="payment-icon">
                    </td>
                    <td>
                      <img src="<?=Yii::$app->request->baseUrl;?>/images/payments/visa.png" alt="Visa Logo" class="payment-icon">
                    </td>
                    <td>
                      <img src="<?=Yii::$app->request->baseUrl;?>/images/payments/master.png" alt="Master Card Logo" class="payment-icon">
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="accept-payment-policy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content" style="margin-top: 200px;">
              <div class="modal-header">
                  <i class="icon-file"></i>  <b>Payment Policy</b>
              </div>
              <div class="modal-body">
                <div class="row" style="margin:10px;">
                  <div class="col-sm-12">
                  <ul>
                    <li>
                    If there is any cancel by you with any reason before started date and no show up for the program the payment is non-refundable.
                    </li>
                    <li>
                    If there are any unexpected situations in any reason such as political, airline schedule change, nature disaster, or any damage to accommodation. We will inform you and make you an alternative itinerary of choose an alternative depart date. If any changes are not possible for you, we will refund a full payment back to you.
                    </li>
                    <li>
                    In case of after arrival and made it home stay, you feel do not like and wanted to cancel you will receive 30% of the amount of payment.
                    </li>
                  </ul>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>
</div>
