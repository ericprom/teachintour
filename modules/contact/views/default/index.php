<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Contact | '.Yii::$app->params["company_name"].'';
?>
<!-- Page Sub Menu
============================================= -->
<div id="page-menu">

  <div id="page-menu-wrap">

    <div class="container clearfix">

      <div class="menu-title">Contact <span>Teachin' Tour</span></div>
    </div>

  </div>

</div><!-- #page-menu end -->

<!-- Contact Form & Map Overlay Section
============================================= -->
<section id="map-overlay">

  <div class="container clearfix">

    <!-- Contact Form Overlay
    ============================================= -->
    <div id="contact-form-overlay-mini" class="clearfix">

      <div class="fancy-title title-dotted-border">
        <h3>Send us an Email</h3>
      </div>

      <div class="contact-widget">

        <div class="contact-form-result"></div>

        <!-- Contact Form
        ============================================= -->
        <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail-recaptcha.php" method="post">

          <div class="col_full">
            <label for="template-contactform-name">Name <small>*</small></label>
            <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
          </div>

          <div class="col_full">
            <label for="template-contactform-email">Email <small>*</small></label>
            <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
          </div>

          <div class="clear"></div>

          <div class="col_full">
            <label for="template-contactform-phone">Phone</label>
            <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
          </div>
          <div class="clear"></div>

          <div class="col_full">
            <label for="template-contactform-subject">Subject <small>*</small></label>
            <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
          </div>

          <div class="col_full">
            <label for="template-contactform-message">Message <small>*</small></label>
            <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
          </div>

          <div class="col_full hidden">
            <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
          </div>

          <div class="col_full">

            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="g-recaptcha" data-sitekey="6LenTh8TAAAAABt_9IkVP4mizk-x73hLg3qWU5SW"></div>

          </div>

          <div class="col_full">
            <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
          </div>

        </form>

      </div>


    </div><!-- Contact Form Overlay End -->

  </div>

  <!-- Google Map
  ============================================= -->
  <section id="google-map" class="gmap"></section>

</section><!-- Contact Form & Map Overlay Section End -->

<script type="text/javascript" src="<?=Yii::$app->request->baseUrl;?>/js/jquery.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="<?=Yii::$app->request->baseUrl; ?>/js/jquery.gmap.js"></script>

  <script type="text/javascript">

    $('#google-map').gMap({
      latitude:17.772840,
      longitude:102.194974,
      maptype: 'ROADMAP',
      zoom: 14,
      markers: [
        {
          latitude:17.772840,
          longitude:102.194974,
          html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Teachin\' Tour</span></h4><p class="nobottommargin">Our mission is to break the language barrier and open the world to local people.</p></div>',
          icon: {
            image: "images/icons/map-icon-red.png",
            iconsize: [32, 39],
            iconanchor: [13,39]
          }
        }
      ],
      doubleclickzoom: false,
      controls: {
        panControl: true,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false
      }
    });


  </script>
