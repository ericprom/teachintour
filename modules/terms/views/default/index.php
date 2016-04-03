<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Terms | '.Yii::$app->params["company_name"].'';
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="http://lorempixel.com/1400/470/" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1>Terms and condition</h1>
        </div>
    </div>
</section><!-- End section -->

<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?=Yii::$app->homeUrl;?>">Home</a></li>
      <li>terms</li>
    </ul>
  </div>
</div><!-- Position -->

<div class="white_bg">
  <div class="container margin_60">
    <div class="row">
      <div class="col-md-12 col-sm-12">
          <h4>Terms and condition</h4>
        </div>
    </div>
    <hr>

    <div class="row">
      <div class="col-md-12 col-sm-12">
          Write Terms and condition here.
        </div>
    </div>
  </div>
</div><!-- End white_bg -->
