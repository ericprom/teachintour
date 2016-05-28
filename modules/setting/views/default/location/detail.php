<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Preview Location | '.Yii::$app->params["company_name"].'';
?>
<!-- Page Title
    ============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1>Preview: Namsom, Udonthani</h1>
  </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <!-- Portfolio Single Gallery Thumbs
      ============================================= -->
      <div class="col_two_third portfolio-single-image nobottommargin">
        <div class="masonry-thumbs col-3" data-big="3" data-lightbox="gallery">
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/1.jpg" alt="Gallery Thumb 1"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/2.jpg" alt="Gallery Thumb 2"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/3.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/3.jpg" alt="Gallery Thumb 3"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/4.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/4.jpg" alt="Gallery Thumb 4"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/5.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/5.jpg" alt="Gallery Thumb 5"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/6.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/6.jpg" alt="Gallery Thumb 6"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/7.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/7.jpg" alt="Gallery Thumb 7"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/8.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/8.jpg" alt="Gallery Thumb 8"></a>
          <a href="<?=Yii::$app->request->baseUrl;?>/images/portfolio/full/9.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/portfolio/3/9.jpg" alt="Gallery Thumb 9"></a>
        </div>
      </div><!-- .portfolio-single-image end -->

      <!-- Portfolio Single Content
      ============================================= -->
      <div class="col_one_third portfolio-single-content col_last nobottommargin">

        <!-- Portfolio Single - Description
        ============================================= -->
        <div class="fancy-title title-bottom-border">
          <h2>Volunteer in Namsom, Udonthani:</h2>
        </div>
        <p>Namsom was picked as the first location to launch the "Teachin' Tour" Project, because the two co-founders are both from Namsom. They have the same passion and desire to make their home town a better place. Teaching is the core of Teachin' Tour program. You will get to teach many kinds of student even "monks". You can help other while you are traveling. Is that cool? Help us break the language barrier. And make Namsom a better place.</p>
        <!-- Portfolio Single - Description End -->

        <div class="divider"><i class="icon-star3"></i></div>
        <h3>At a glance</h3>
        <!-- Portfolio Single - Meta
        ============================================= -->
        <ul class="portfolio-meta bottommargin">
          <li><i class="icon-check"></i> Available year-round</li>
          <li><i class="icon-check"></i> Homestay</li>
          <li><i class="icon-check"></i> Airport pick-up</li>
          <li><i class="icon-check"></i> Orientation</li>
          <li><i class="icon-check"></i> Accommodation</li>
          <li><i class="icon-check"></i> 3 Meals/Day</li>
          <li><i class="icon-check"></i> Program fees from $300 for 1 week</li>
          <li><i class="icon-check"></i> A special 1 week volunteer program is available</li>

        </ul>
        <!-- Portfolio Single - Meta End -->

        <div class="divider"><i class="icon-star3"></i></div>

        <!-- Portfolio Single - Share End -->
      </div><!-- .portfolio-single-content end -->
      <div class="clear"></div>
    </div>
  </div>
</section><!-- #content end -->
