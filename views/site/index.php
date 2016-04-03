<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'teachin tour - teachin\' learnin\' and discoverin\' the local people';
?>
<section class="header-video">
  <div id="hero_video">
    <div class="intro_title">
      <h1 class="animated fadeInDown"><strong id="js-rotating"> Teaching, Learning, Discovering</strong> Local People</h1>
      <p class="animated fadeInDown">Teaching / Learning / Discovering</p>
      <a href="#" class="animated fadeInUp button_intro">Signup Now</a>
      <a href="#" class="animated fadeInUp button_intro outline">View Detail</a>
    </div>
  </div>
  <img src=""  alt="" class="header-video--media" data-video-src=""  data-teaser-source="video/thailand" data-provider="Youtube" data-video-width="854" data-video-height="480">
</section><!-- End Header video -->
<div class="container margin_60">
  <div class="main_title">
    <h2>Breaking <span>Language</span> Barrier</h2>
    <p>Help local connect to the world by teaching them English</p>
  </div>
  <div class="row">
    <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
      <div class="feature_home">
        <i class="icon_set_1_icon-41"></i>
        <h3><span>+100</span> Schools</h3>
        <p>
             There are more than a hunred schools are waitting for you help.
        </p>
      </div>
    </div>

    <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
      <div class="feature_home">
        <i class="icon_set_1_icon-30"></i>
        <h3><span>+1000</span> Teacher</h3>
        <p>
             Right now, a thousand plus teachers from all over the world are joining and helping.
        </p>
      </div>
    </div>

    <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
      <div class="feature_home">
        <i class="icon_set_1_icon-85"></i>
        <h3><span>+100K </span> Learn</h3>
        <p>
             One hunred thousand local students get to learn and be able to speak English.
        </p>
      </div>
    </div>
  </div>
</div><!-- End container -->

<div class="white_bg">
  <div class="container margin_60">
    <div class="main_title">
      <h2>Our <span>Top</span> Packages</h2>
      <p>You can pick the package that suit your style for remarkable experiences</p>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
        <div class="hotel_container">
          <div class="img_container">
            <a href="single_hotel.html">
            <img src="http://lorempixel.com/800/533/" width="800" height="533" class="img-responsive" alt="">
            <div class="ribbon top_rated"></div>
            <div class="short_info hotel">
              Cost<span class="price"><sup>$</sup>400</span>
            </div>
            </a>
          </div>
          <div class="hotel_title">
            <h3><i class="icon_set_1_icon-53"></i> <strong>2 Weeks</strong></h3>
          </div>
        </div><!-- End box -->
      </div><!-- End col-md-4 -->
      <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
        <div class="hotel_container">
          <div class="img_container">
            <a href="single_hotel.html">
            <img src="http://lorempixel.com/800/533/" width="800" height="533" class="img-responsive" alt="">
            <div class="ribbon top_rated"></div>
            <div class="short_info hotel">
              Cost<span class="price"><sup>$</sup>600</span>
            </div>
            </a>
          </div>
          <div class="hotel_title">
            <h3><i class="icon_set_1_icon-53"></i> <strong>4 Weeks</strong></h3>
          </div>
        </div><!-- End box -->
      </div><!-- End col-md-4 -->
      <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
        <div class="hotel_container">
          <div class="img_container">
            <a href="single_hotel.html">
            <img src="http://lorempixel.com/800/533/" width="800" height="533" class="img-responsive" alt="">
            <div class="ribbon top_rated"></div>
            <div class="short_info hotel">
              Cost<span class="price"><sup>$</sup>1000</span>
            </div>
            </a>
          </div>
          <div class="hotel_title">
            <h3><i class="icon_set_1_icon-53"></i> <strong>8 Weeks</strong></h3>
          </div>
        </div><!-- End box -->
      </div><!-- End col-md-4 -->
    </div><!-- End row -->
    <div class="banner colored">
      <h4>Discover our other package <span>from $300</span></h4>
      <p>
          What are you waiting for? They are waiting for your help.
      </p>
      <?=Html::a('See more', ['/package/'],['data' => ['method' => 'post'],'class'=>'btn_1 white']);?>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 text-center">
        <p>
            <img src="http://lorempixel.com/800/450/" alt="Pic" class="img-responsive">
        </p>
        <h4><span>Teaching</span> Local</h4>
        <p>
            Teaching is the core of our program. You will get to teach many kind of student even "monks".
        </p>
      </div>
      <div class="col-md-3 col-sm-6 text-center">
        <p>
            <img src="http://lorempixel.com/800/450/" alt="Pic" class="img-responsive">
        </p>
        <h4><span>Learning</span> Local</h4>
        <p>
            While you are in the teaching program, you will get to learn about our culture.
        </p>
      </div>
      <div class="col-md-3 col-sm-6 text-center">
        <p>
            <img src="http://lorempixel.com/800/450/" alt="Pic" class="img-responsive">
        </p>
        <h4><span>Discovering</span> Local</h4>
        <p>
            Teachin' Tour is the new way of traveling. You will get to teach and tour at the same time to discover the most remarkable experience.
        </p>
      </div>
      <div class="col-md-3 col-sm-6 text-center">
        <p>
            <img src="http://lorempixel.com/800/450/" alt="Pic" class="img-responsive">
        </p>
        <h4><span>Helping</span> Local</h4>
        <p>
            You can help other while you are traveling. Is that cool? Help us break the language barrier.
        </p>
      </div>
    </div><!-- End row -->
  </div><!-- End container -->
</div><!-- End white_bg -->
<section class="promo_full">
  <div class="promo_full_wp magnific">
    <div>
        <h3>TEACHIN EXPERIENCE</h3>
        <p>
            Get the remarkable experience in Thailand through teaching a local students.
        </p>
        <a href="https://www.youtube.com/watch?v=kYX5GfkXvmQ" class="video"><i class="icon-play-circled2-1"></i></a>
    </div>
  </div>
</section><!-- End section -->
<div class="container margin_60">
  <div class="row">
    <div class="col-md-8 col-sm-6 hidden-xs">
      <img src="img/laptop.png" alt="Laptop" class="img-responsive laptop">
    </div>
    <div class="col-md-4 col-sm-6">
      <h3><span>Steps</span> to start helping</h3>
      <p>
         We are the place where you can help breaking the language barrier and find a new way of travelling to discover an unseen thailand through the local.
      </p>
      <ul class="list_order">
          <li><span>1</span>Select prefer package</li>
          <li><span>2</span>Build your profile</li>
          <li><span>3</span>Come to thailand</li>
      </ul>
      <a href="all_tour_list.html" class="btn_1">Start now</a>
    </div>
  </div><!-- End row -->
</div><!-- End container -->
