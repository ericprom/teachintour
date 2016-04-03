<?php

/* @var $this yii\web\View */

$this->title = 'contact';
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="http://lorempixel.com/1400/470/" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
            <h1>Contact us</h1>
            </div>
        </div>
    </section><!-- End Section -->

    <div id="position">
      <div class="container">
                  <ul>
                    <li><a href="<?=Yii::$app->homeUrl;?>">Home</a></li>
                    <li>Contact us</li>
                    </ul>
        </div>
    </div><!-- End Position -->

<div class="container margin_60">
  <div class="row">
    <div class="col-md-8 col-sm-8">
      <div class="form_title">
        <h3><strong><i class="icon-pencil"></i></strong>What'd you like to say?</h3>
        <p>
          We want to hear from you.
        </p>
      </div>
      <div class="step">

        <div id="message-contact"></div>
        <form method="post" action="assets/contact.php" id="contactform">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Enter Name">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Enter Last Name">
              </div>
            </div>
          </div>
          <!-- End row -->
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Enter Email">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Phone</label>
                <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Enter Phone number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Message</label>
                <textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="Write your message" style="height:200px;"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>Human verification</label>
              <input type="text" id="verify_contact" class=" form-control add_bottom_30" placeholder="Are you human? 3 + 1 =">
              <input type="submit" value="Submit" class="btn_1" id="submit-contact">
            </div>
          </div>
        </form>
      </div>
    </div><!-- End col-md-8 -->

    <div class="col-md-4 col-sm-4">
      <div class="box_style_1">
        <span class="tape"></span>
        <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
        <p>
          <?=Yii::$app->params['contact_address'];?>
        </p>
        <hr>
        <h4>Other way <span><i class="icon-help pull-right"></i></span></h4>
        <p>
          Feel free to contact us for mor information or visit us at the office near you.
        </p>
        <ul id="contact-info">
          <li><i class="icon_set_1_icon-55"></i> <?=Yii::$app->params['contact_number'];?></li>
          <li><i class="icon_set_1_icon-84"></i> <?=Yii::$app->params['contact_email'];?></li>
        </ul>
      </div>
      <div class="box_style_4">
        <i class="icon_set_1_icon-57"></i>
        <h4>Need <span>Help?</span></h4>
        <a href="tel://<?=Yii::$app->params['contact_number'];?>" class="phone"><?=Yii::$app->params['contact_number'];?></a>
        <small>Monday to Friday 9.00am - 6.00pm</small>
      </div>
    </div><!-- End col-md-4 -->
  </div><!-- End row -->
</div><!-- End container -->

<div id="map_contact"></div><!-- end map-->
<div id="directions">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
       <form action="http://maps.google.com/maps" method="get" target="_blank">
        <div class="input-group">
          <input type="text" name="saddr" placeholder="Enter your starting point" class="form-control style-2" />
          <input type="hidden" name="daddr" value="New York, NY 11430"/><!-- Write here your end point -->
          <span class="input-group-btn">
          <button class="btn" type="submit" value="Get directions" style="margin-left:0;">GET DIRECTIONS</button>
          </span>
        </div><!-- /input-group -->
      </form>
          </div>
        </div>
    </div>
  </div><!-- end directions-->
