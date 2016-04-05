<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'location';
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="http://lorempixel.com/1400/470/" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <h1>Namsom</h1>
                    <span>Udonthani, TH</span>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div id="price_single_main">
                        from/per person <span><sup>$</sup>52</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- End section -->

    <div id="position">
            <div class="container">
                        <ul>
                        <li><a href="<?=Yii::$app->homeUrl;?>">Home</a></li>
                        <li>Location detail</li>
                        </ul>
            </div>
    </div><!-- End Position -->


     <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div><!-- End Map -->

    <div class="container margin_60">
    <div class="row">
        <div class="col-md-8" id="single_tour_desc">
            <div id="single_tour_feat">
                <ul>
          <li><i class="icon_set_3_restaurant-1"></i>Pizza /Italian</li>
          <li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
          <li><i class="icon_set_1_icon-82"></i>144 Likes</li>
          <li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
          <li><i class="icon_set_1_icon-27"></i>Parking</li>
                    <li><i class="icon_set_1_icon-47"></i>No smoking area</li>
        </ul>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h3>Description</h3>
                </div>
                <div class="col-md-9">
                    <h4>About us</h4>
          <p>
            Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.
          </p>
          <h4>Menu and dishes</h4>
          <p>
            Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.
          </p>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <ul class="list_ok">
                <li>Lorem ipsum dolor sit amet</li>
                <li>No scripta electram necessitatibus sit</li>
                <li>Quidam percipitur instructior an eum</li>
                <li>Ut est saepe munere ceteros</li>
                <li>No scripta electram necessitatibus sit</li>
                <li>Quidam percipitur instructior an eum</li>
              </ul>
            </div>
            <div class="col-md-6 col-sm-6">
              <ul class="list_ok">
                <li>Lorem ipsum dolor sit amet</li>
                <li>No scripta electram necessitatibus sit</li>
                <li>Quidam percipitur instructior an eum</li>
                <li>No scripta electram necessitatibus sit</li>
              </ul>
                        </div>
                    </div>
                    <!-- End row  -->
                </div>
            </div>
            <hr>
        </div><!--End  single_tour_desc-->

        <aside class="col-md-4">
      <div class="box_style_1">
        <span class="tape"></span>
        <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
        <p>
          45/140 The tree Privata, Bangsue, Bangkok 10800, Thailand.
        </p>
        <hr>
        <h4>Other way <span><i class="icon-help pull-right"></i></span></h4>
        <p>
          Feel free to contact us for mor information or visit us at the office near you.
        </p>
        <ul id="contact-info">
          <li><i class="icon_set_1_icon-55"></i> +66 88 066 6933</li>
          <li><i class="icon_set_1_icon-84"></i> info@teachintour.com</li>
        </ul>
      </div>
      <div class="box_style_4">
        <i class="icon_set_1_icon-57"></i>
        <h4>Need <span>Help?</span></h4>
        <a href="tel://<?=Yii::$app->params['contact_number'];?>" class="phone"><?=Yii::$app->params['contact_number'];?></a>
        <small>Monday to Friday 9.00am - 6.00pm</small>
      </div>

        </aside>
    </div><!--End row -->
    </div><!--End container -->

