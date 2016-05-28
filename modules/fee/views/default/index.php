<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Fees | '.Yii::$app->params["company_name"].'';
?>
<section id="content" ng-controller="FeeController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="heading-block center">
        <h2>Program Fees</h2>
        <span>We believe in Flexible Costing.</span>
      </div>
      <div class="pricing bottommargin clearfix">
        <div class="col-md-3" ng-repeat="fee in Fees" ng-show="fee.shelf">
          <div class="pricing-box" ng-class="(fee.popular)?'best-price':''">
            <div class="pricing-title">
              <h3>{{fee.title}}</h3>
              <span ng-show="fee.popular">Most Popular</span>
            </div>
            <div class="pricing-price">
              <span class="price-unit">&dollar;</span>{{fee.price | number}}
            </div>
            <div class="pricing-features">
              <ul>
                <li ng-repeat="detail in fee.detail"><strong>{{detail.title}}</strong></li>
                <li ng-show="fee.popular">
                  <i class="icon-star3"></i>
                  <i class="icon-star3"></i>
                  <i class="icon-star3"></i>
                  <i class="icon-star3"></i>
                  <i class="icon-star3"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
      <h4>Affordable packages for volunteers</h4>

      <div class="table-responsive">
        <table class="table table-bordered nobottommargin">
        <thead>
          <tr>
          <th>Volunteer Period</th>
          <th>Program FEE US$</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="fee in Fees">
            <td>{{fee.title}}</td>
            <td>${{fee.price | number}}</td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
    <div class="section topmargin-sm footer-stick">
      <div class="heading-block center">
        <h3><span>Ready</span> to get started?</h3>
        <span>For more specific program information please contact us.</span>
      </div>
      <div class="center">
      <?=Html::a('Apply Now', ['/apply/'],['data' => ['method' => 'post'],'class'=>'button button-border button-rounded button-large']);?>
      </div>
    </div>
  </div>
</section><!-- #content end -->
