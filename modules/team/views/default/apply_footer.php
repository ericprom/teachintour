<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="section topmargin-sm footer-stick">
  <div class="heading-block center">
    <h3><span>Ready</span> to get started?</h3>
    <span>Feel free to contact us for more information or visit us at the office near you.</span>
  </div>
  <div class="center">
  <?=Html::a('Apply Now', ['/apply/'],['data' => ['method' => 'post'],'class'=>'button button-border button-rounded button-large']);?>
  </div>
</div>
