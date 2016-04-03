<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'location';
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="http://lorempixel.com/1400/470/" data-natural-width="1400" data-natural-height="470">
  <div class="parallax-content-1">
    <div class="animated fadeInDown">
      <h1>Location</h1>
    </div>
  </div>
</section><!-- End Section -->
<div id="position">
  <div class="container">
    <ul>
      <li><a href="<?=Yii::$app->homeUrl;?>">Home</a></li>
      <li>location</li>
    </ul>
  </div>
</div><!-- Position -->
<div  class="container margin_60">
  <div class="row">
    <div class="col-lg-9 col-md-9">
      <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="img_list">
              <a href="<?=Yii::$app->request->baseUrl; ?>/location/1">
                <img src="http://lorempixel.com/800/533/" alt="">
                <div class="short_info"><i class=" icon_set_1_icon-41"></i> School</div>
              </a>
            </div>
          </div>
          <div class="clearfix visible-xs-block"></div>
          <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="tour_list_desc">
              <a href="<?=Yii::$app->request->baseUrl; ?>/location/1">
              <h3><strong>King food</strong> restaurant</h3>
              </a>
              <p>Lorem ipsum dolor sit amet, quem convenire interesset ut vix, ad dicat sanctus detracto vis. Eos modus dolorum ex, qui adipisci maiestatis inciderint no, eos in elit dicat.....</p>
              <ul class="add_info">
                <li>
                  <div class="tooltip_styled tooltip-effect-4">
                    <span class="tooltip-item"><i class="icon_set_1_icon-13"></i></span>
                    <div class="tooltip-content"><h4>Disabled</h4>
                          Usu in novum nostrud disputando, ei quo aperiri omittam vidit fastidii.<br>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="tooltip_styled tooltip-effect-4">
                    <span class="tooltip-item"><i class="icon_set_1_icon-47"></i></span>
                        <div class="tooltip-content"><h4>No smoking area</h4>
                            Usu in novum nostrud disputando, ei quo aperiri omittam vidit fastidii.<br>
                      </div>
                    </div>
                </li>
                <li>
                  <div class="tooltip_styled tooltip-effect-4">
                    <span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
                    <div class="tooltip-content"><h4>Parking</h4>
                          Usu in novum nostrud disputando, ei quo aperiri omittam vidit fastidii.<br>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="tooltip_styled tooltip-effect-4">
                    <span class="tooltip-item"><i class="icon_set_1_icon-25"></i></span>
                    <div class="tooltip-content"><h4>Transport</h4>
                          Usu in novum nostrud disputando, ei quo aperiri omittam vidit fastidii.<br>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div><!--End strip -->
      <hr>
      <div class="text-center">
          <ul class="pagination">
              <li><a href="#">Prev</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">Next</a></li>
          </ul>
      </div><!-- end pagination-->
    </div><!-- End col lg-9 -->
    <aside class="col-lg-3 col-md-3">
      <div class="box_style_2">
        <i class="icon_set_1_icon-57"></i>
        <h4>Need <span>Help?</span></h4>
        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
        <small>Monday to Friday 9.00am - 7.30pm</small>
      </div>
    </aside><!--End aside -->
  </div><!-- End row -->
</div><!-- End container -->
