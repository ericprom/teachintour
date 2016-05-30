<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Locations | '.Yii::$app->params["company_name"].'';
?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1>Locations</h1>
  </div>

</section>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div id="posts">
        <div class="entry clearfix">
          <div class="entry-image clearfix">
            <div class="portfolio-single-image masonry-thumbs col-6" data-big="3" data-lightbox="gallery">
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
              <a href="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" data-lightbox="gallery-item"><img class="image_fade" src="<?=Yii::$app->request->baseUrl;?>/images/locations/galleries/1/koket.jpg" alt=""></a>
            </div>
          </div>
          <div class="entry-title">
            <h2>
              <a href="<?=Url::to(['/location'])?>/1"  ng-show="get.thumb!=''">
                Namsom, Udonthani
              </a>
            </h2>
          </div>
          <ul class="entry-meta clearfix">
            <li><i class="icon-folder-open"></i> Teachin' English</li>
          </ul>
          <div class="entry-content">
            <p>Namsom was picked as the first location to launch the "teachin' tour" Project, because the two co-founders are both from Namsom. They have the same passion and desire to make their home town a better place. Teachin' English is the core of teachin' tour program. You will get to teach many kinds of student even "monks". You can help other while you are traveling. Is that cool? Help us break the language barrier. And make Namsom a better place.</p>
            <?=Html::a('Apply Now', ['/apply/'],['data' => ['method' => 'post'],'class'=>'button button-border button-rounded button-large']);?>
          </div>
        </div>

      </div>
    </div>
    <?= $this->render('apply_footer') ?>
  </div>
</section>
