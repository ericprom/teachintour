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
            <a href="<?=Url::to(['/setting/project/add'])?>">
              Create New Project
            </a>
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
    </div>
  </div>
</div>
