<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Fees | '.Yii::$app->params["company_name"].'';
?>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="heading-block center">
        <h2>Program Fees</h2>
        <span>We believe in Flexible Costing.</span>
      </div>
      <div class="pricing bottommargin clearfix">
        <div class="col-md-3">
          <div class="pricing-box">
            <div class="pricing-title">
              <h3>1 Week</h3>
            </div>
            <div class="pricing-price">
              <span class="price-unit">&dollar;</span>250
            </div>
            <div class="pricing-features">
              <ul>
                <li><strong>Home stay</strong></li>
                <li>Airport <strong>Pick-up</strong></li>
                <li><strong>3</strong> Meals a day</li>
                <li><strong>Bike</strong></li>
                <li><strong>Other</strong></li>
              </ul>
            </div>
          </div>

        </div>

        <div class="col-md-3">

          <div class="pricing-box best-price">
            <div class="pricing-title">
              <h3>2 Weeks</h3>
              <span>Most Popular</span>
            </div>
            <div class="pricing-price">
              <span class="price-unit">&dollar;</span>450
            </div>
            <div class="pricing-features">
              <ul>
                <li><strong>Home stay</strong></li>
                <li>Airport <strong>Pick-up</strong></li>
                <li><strong>3</strong> Meals a day</li>
                <li><strong>Bike</strong></li>
                <li><strong>Other</strong></li>
                <li><i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i>
                <i class="icon-star3"></i></li>
              </ul>
            </div>
          </div>

        </div>

        <div class="col-md-3">

          <div class="pricing-box">
            <div class="pricing-title">
              <h3>4 Weeks</h3>
            </div>
            <div class="pricing-price">
              <span class="price-unit">&dollar;</span>650
            </div>
            <div class="pricing-features">
              <ul>
                <li><strong>Home stay</strong></li>
                <li>Airport <strong>Pick-up</strong></li>
                <li><strong>3</strong> Meals a day</li>
                <li><strong>Bike</strong></li>
                <li><strong>Other</strong></li>
              </ul>
            </div>
          </div>

        </div>

        <div class="col-md-3">

          <div class="pricing-box">
            <div class="pricing-title">
              <h3>8 Weeks</h3>
            </div>
            <div class="pricing-price">
              <span class="price-unit">&dollar;</span>1000
            </div>
            <div class="pricing-features">
              <ul>
                <li><strong>Home stay</strong></li>
                <li>Airport <strong>Pick-up</strong></li>
                <li><strong>3</strong> Meals a day</li>
                <li><strong>Bike</strong></li>
                <li><strong>Other</strong></li>
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
          <tr>
          <td>1 Week</td>
          <td>$250</td>
          </tr>
          <tr>
          <td>2 Weeks</td>
          <td>$450</td>
          </tr>
          <tr>
          <td>3 Weeks</td>
          <td>$550</td>
          </tr>
          <tr>
          <td>4 Weeks</td>
          <td>$650</td>
          </tr>
          <tr>
          <td>5 Weeks</td>
          <td>$750</td>
          </tr>
          <tr>
          <td>6 Weeks</td>
          <td>$850</td>
          </tr>
          <tr>
          <td>7 Weeks</td>
          <td>$950</td>
          </tr>
          <tr>
          <td>8 Weeks</td>
          <td>$1,000</td>
          </tr>
          <tr>
          <td>10 Weeks</td>
          <td>$1,100</td>
          </tr>
          <tr>
          <td>12 Weeks</td>
          <td>$1,200</td>
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
