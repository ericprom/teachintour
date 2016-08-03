<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Contact | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Contact <span>Teachin' Tour</span></div>
    </div>
  </div>
</div>
<section id="map-overlay">
  <div class="container clearfix" ng-controller="ContactFormController" ng-cloak>
    <div id="contact-form-overlay-mini" class="clearfix">
      <div class="fancy-title title-dotted-border">
        <h3>Send us an Email</h3>
      </div>
      <div class="contact-widget">
        <div class="contact-form-result"></div>
          <div class="col_full" style="margin-bottom: 25px;">
            <label for="template-contactform-name">Fullname <small>*</small></label>
            <input type="text" class="sm-form-control" id="template-contactform-name" ng-model="mail.fullname"/>
          </div>
          <div class="col_full" style="margin-bottom: 25px;">
            <label for="template-contactform-email">Email <small>*</small></label>
            <input type="email" class="sm-form-control" id="template-contactform-email" ng-model="mail.email"/>
          </div>
          <div class="clear"></div>
          <div class="col_full" style="margin-bottom: 25px;">
            <label for="template-contactform-phone">Phone</label>
            <input type="number" class="sm-form-control" id="template-contactform-phone" ng-model="mail.phone"/>
          </div>
          <div class="clear"></div>
          <div class="col_full" style="margin-bottom: 25px;">
            <label for="template-contactform-subject">Subject <small>*</small></label>
            <input type="text" class="sm-form-control" id="template-contactform-subject" ng-model="mail.subject"/>
          </div>
          <div class="col_full" style="margin-bottom: 25px;">
            <label for="template-contactform-message">Message <small>*</small></label>
            <textarea class="required sm-form-control" rows="6" cols="30" id="template-contactform-message"  ng-model="mail.message"></textarea>
          </div>
          <div class="col_full" style="margin-bottom: 25px;">
            <label  for="template-contactform-bot"><small>*</small>Human verification<small>*</small></label>
            <input type="text" ng-model="mail.bot" class="form-control" id="template-contactform-bot">
          </div>
          <div class="col_full" style="margin-bottom: 25px;">
            <button class="button button-3d nomargin" ng-click="contactUs()" style="width:100%;">
            <i ng-class="(mail.send)?'icon-refresh icon-spin':'icon-mail'"></i>
            Send Message
            </button>
          </div>
      </div>
    </div>
  </div>
  <section id="google-map" class="gmap"></section>
</section>
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
          html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Welcome to <span>Teachin\' Tour</span></h4><p class="nobottommargin">Our mission is to break the language barrier and open the world to local people.<br><br>Address: 71/1 Srisamran, Namsom district, Udonthani 41210, Thailand.<br><br>Tel: +669-5449-2245</p></div>',
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
