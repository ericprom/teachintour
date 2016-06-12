<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Preview Location | '.Yii::$app->params["company_name"].'';
?>
<div ng-controller="SettingLocationDetailController" ng-cloak>
  <section id="page-title" ng-show="hasItem && !isLoading">

    <div class="container clearfix">
      <h1>Preview: {{Location.title}}</h1>
    </div>
  </section>
  <section id="content">
    <div class="content-wrap" ng-show="!hasItem && !isLoading">
      <div class="container clearfix">
        <div class="col_full">
          <div class="error404 center">404</div>
        </div>
      </div>
    </div>
    <div class="content-wrap" ng-show="hasItem && !isLoading">
      <div class="container clearfix">
        <div class="col_two_third portfolio-single-image nobottommargin">
          <div class="masonry-thumbs col-3" data-big="3" data-lightbox="gallery">
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 1"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 2"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 3"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 4"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 5"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 6"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 7"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 8"></a>
            <a href="{{Location.cover[1]}}" data-lightbox="gallery-item"><img class="image_fade" src="{{Location.cover[1]}}" alt="Gallery Thumb 9"></a>
          </div>
        </div>
        <div class="col_one_third portfolio-single-content col_last nobottommargin">
          <div class="fancy-title title-bottom-border">
            <h2>Volunteer in {{Location.title}}:</h2>
          </div>
          <p>{{Location.detail}}</p>

          <div class="divider"><i class="icon-star3"></i></div>
          <h3>At a glance</h3>
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
          <div class="divider"><i class="icon-star3"></i></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </section>
</div>
