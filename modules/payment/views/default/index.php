<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'payment';
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="http://lorempixel.com/1400/470/" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1>Selected 2 Weeks Package</h1>
            <div class="bs-wizard">

                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Package</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <?=Html::a('',['/package/'],['class'=>'bs-wizard-dot']);?>
                </div>

                <div class="col-xs-4 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Payment</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <?=Html::a('',['/payment/'],['class'=>'bs-wizard-dot']);?>
                </div>

              <div class="col-xs-4 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">Done!</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <?=Html::a('',['/confirmation/'],['class'=>'bs-wizard-dot']);?>
                </div>

    </div>  <!-- End bs-wizard -->
        </div>
    </div>
</section><!-- End Section -->
    <div id="position">
      <div class="container">
                  <ul>
                    <li><a href="<?=Yii::$app->homeUrl;?>">Home</a></li>
                    <li>payment</li>
                    </ul>
        </div>
    </div><!-- End position -->

<div class="container margin_60">
  <div class="row">
    <div class="col-md-8 add_bottom_15">
      <div class="form_title">
        <h3><strong><i class="icon-credit-card-1"></i></strong> Credit Card</h3>
        <p>
          Payment type
        </p>
      </div>
      <div class="step">
        <div class="form-group">
          <label>Name on card</label>
          <input type="text" class="form-control" id="name_card_bookign" name="name_card_bookign">
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <label>Card number</label>
              <input type="text" id="card_number" name="card_number" class="form-control">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <img src="img/cards.png" width="207" height="43" alt="Cards" class="cards">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label>Expiration date</label>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" id="expire_month" name="expire_month" class="form-control" placeholder="MM">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" id="expire_year" name="expire_year" class="form-control" placeholder="Year">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Security code</label>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" id="ccv" name="ccv" class="form-control" placeholder="CCV">
                  </div>
                </div>
                <div class="col-md-8">
                  <img src="img/icon_ccv.gif" width="50" height="29" alt="ccv"><small>Last 3 digits</small>
                </div>
              </div>
            </div>
          </div>
        </div><!--End row -->
      </div><!--End step -->
      <div class="form_title">
        <h3><strong><i class="icon-paypal"></i></strong> PayPal</h3>
        <p>
          Payment type
        </p>
      </div>
      <div class="step">
        <div class="row">
          <img src="img/paypal_bt.png" alt="">
        </div><!--End row -->
      </div><!--End step -->

      <div class="form_title">
        <h3><strong><i class="icon-money"></i></strong> Bank Transfer</h3>
        <p>
          Payment type
        </p>
      </div>
      <div class="step">
        <div class="row">

        </div><!--End row -->
      </div><!--End step -->
    </div>

    <aside class="col-md-4">
      <div class="box_style_1 expose">
        <h3 class="inner">Desire Date</h3>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label><i class="icon-calendar-7"></i> Start date</label>
                    <input class="form-control" data-date-format="M d, D" type="text" id="check_in" placeholder="Start date">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Adults</label>
                    <div class="numbers-row">
                        <input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Children</label>
                    <div class="numbers-row">
                        <input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
                    </div>
                </div>
            </div>
        </div>
      </div><!--/box_style_1 -->
      <div class="box_style_1">
        <h3 class="inner">- Summary -</h3>
        <table class="table table_summary">
        <tbody>
        <tr>
          <td>
            Adults
          </td>
          <td class="text-right">
            2
          </td>
        </tr>
        <tr>
          <td>
            Children
          </td>
          <td class="text-right">
            0
          </td>
        </tr>
        <tr class="total">
          <td>
            Total cost
          </td>
          <td class="text-right">
            $154
          </td>
        </tr>
        </tbody>
        </table>
        <div class="form-group">
          <label><input type="checkbox" name="policy_terms" id="policy_terms"> I accept terms and conditions and general policy.</label>
        </div>
        <?=Html::a('Book now', ['/confirmation/'],['data' => ['method' => 'post'], 'class'=>'btn_full']);?>
      </div>


      <div class="box_style_4">
          <i class="icon_set_1_icon-90"></i>
          <h4><span>Book</span> by phone</h4>
          <a href="tel://66880666933" class="phone">+66 88 0666 6933</a>
          <small>Monday to Friday 9.00am - 6.00pm</small>
      </div>
    </aside>
  </div><!--End row -->
</div><!--End container -->
