<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'All Settings | '.Yii::$app->params["company_name"].'';
?>
<section id="page-title">
  <div class="container clearfix">
    <h1>All Settings</h1>
    <span>teachin' tour management system</span>
  </div>

</section>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="col_one_third">
        <div class="feature-box fbox-center fbox-border fbox-dark fbox-effect noborder">
          <div class="fbox-icon">
            <a href="<?=Url::to(['/setting/location'])?>"><i class="icon-map-marker"></i></a>
          </div>
          <h3>Manage Location<span class="subtitle">Create and Update Locations</span></h3>
        </div>
      </div>
      <div class="col_one_third">
        <div class="feature-box fbox-center fbox-border fbox-dark fbox-effect noborder">
          <div class="fbox-icon">
            <a href="<?=Url::to(['/setting/project'])?>"><i class="icon-sitemap"></i></a>
          </div>
          <h3>Manage Project<span class="subtitle">Create and Update Projects</span></h3>
        </div>
      </div>
      <div class="col_one_third col_last">
        <div class="feature-box fbox-center fbox-border fbox-dark fbox-effect noborder">
          <div class="fbox-icon">
            <a href="<?=Url::to(['/setting/fee'])?>"><i class="icon-dollar"></i></a>
          </div>
          <h3>Manage Fee<span class="subtitle">Create and Update Fees</span></h3>
        </div>
      </div>
      <div class="col_one_third">
        <div class="feature-box fbox-center fbox-border fbox-dark fbox-effect noborder">
          <div class="fbox-icon">
            <a href="<?=Url::to(['/setting/application'])?>"><i class="icon-file"></i></a>
          </div>
          <h3>Manage Application<span class="subtitle">Mange & Approve Applicants</span></h3>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
