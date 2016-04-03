<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Confirmation | '.Yii::$app->params["company_name"].'';
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

                <div class="col-xs-4 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Payment</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <?=Html::a('',['/payment/'],['class'=>'bs-wizard-dot']);?>
                </div>

              <div class="col-xs-4 bs-wizard-step complete">
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
                    <li>confirmation</li>
                    </ul>
        </div>
    </div><!-- End position -->

    <div class="container margin_60">
  <div class="row">
    <div class="col-md-8 add_bottom_15">

      <div class="form_title">
        <h3><strong><i class="icon-ok"></i></strong>Thank you!</h3>
        <p>
          Hope to see you soon.
        </p>
      </div>
      <div class="step">
        <p>
          You payment is completed. Please allow up to two to three weeks for the process to be done. We can speeded up the process If there is a need. All the paper work will be sending to your email as listed in your profile.
        </p>
      </div><!--End step -->

      <div class="form_title">
        <h3><strong><i class="icon-tag-1"></i></strong>Booking summary</h3>
        <p>
          Here are your booking summary.
        </p>
      </div>
      <div class="step">
        <table class="table confirm">
        <thead>
        <tr>
          <th colspan="2">
            2 Weeks package
          </th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>
            <strong>Desire Date</strong>
          </td>
          <td>
            25 Febraury 2015
          </td>
        </tr>
        <tr>
          <td>
            <strong>Adult</strong>
          </td>
          <td>
            1
          </td>
        </tr>
        <tr>
          <td>
            <strong>Children</strong>
          </td>
          <td>
            1
          </td>
        </tr>
        <tr>
          <td>
            <strong>Payment type</strong>
          </td>
          <td>
            Credit card
          </td>
        </tr>
        </tbody>
        </table>
      </div><!--End step -->
    </div><!--End col-md-8 -->

    <aside class="col-md-4">
    <div class="box_style_1">
      <h3 class="inner">Thank you!</h3>
      <p>
        Thanks you for joining us. We are appreciate you help. Together we can break the language barrier. Together we can build a better community. Hoping to see you soon. God bless you.
      </p>
      <hr>
      <a class="btn_full_outline" href="invoice.html" target="_blank">View your invoice</a>
    </div>
    <div class="box_style_4">
      <i class="icon_set_1_icon-89"></i>
      <h4>Have <span>questions?</span></h4>
      <a href="tel://<?=Yii::$app->params['contact_number'];?>" class="phone"><?=Yii::$app->params['contact_number'];?></a>
      <small>Monday to Friday 9.00am - 6.00pm</small>
    </div>
    </aside>

  </div><!--End row -->
</div><!--End container -->
