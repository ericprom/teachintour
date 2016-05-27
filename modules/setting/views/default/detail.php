<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'View Projects | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">View <span>Projects</span></div>
      <nav>
        <ul>
          <li class="current">
            <?=Html::a('Create New Projrct', ['/setting/project/add'],['data' => ['method' => 'get']]);?>
          </li>
        </ul>
      </nav>
    <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>
    </div>
  </div>
</div>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Project Detail</h3>
      </div>
      <div id="posts" class="events small-thumbs">
        <div class="entry clearfix">
          <div class="entry-image hidden-sm">
            <img src="../images/project/teachin.png" alt="">
          </div>
          <div class="entry-c">
            <div class="entry-title">
              <h2>Teachin' English</h2>
            </div>
            <ul class="entry-meta clearfix">
              <li><span class="label label-success">Active</span></li>
            </ul>
            <div class="entry-content">
              <a href="<?=Url::to(['/setting/project'])?>/1" class="btn btn-default"><i class="icon-eye"></i> Preview</a>
              <a href="<?=Url::to(['/setting/project/edit'])?>/1" class="btn btn-danger"><i class="icon-edit"></i> Edit</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
