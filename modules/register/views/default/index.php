<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Register | '.Yii::$app->params["company_name"].'';
?>
<section id="hero" class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login">
        <div class="text-center"><img src="img/logo_sticky.png" alt="" data-retina="true" ></div>
        <hr>
        <form>
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class=" form-control"  placeholder="Username">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class=" form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class=" form-control" id="password1" placeholder="Password">
          </div>
          <hr>
          By clicking <span class="label label-success">Register</span>, you agree to the Teachin' Tour's <?=Html::a('Terms and Conditions', ['/terms/'],['data' => ['method' => 'post']]);?> set out by this site, including our Cookie Use.
          <div id="pass-info" class="clearfix"></div>
          <button class="btn_full">Register</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
