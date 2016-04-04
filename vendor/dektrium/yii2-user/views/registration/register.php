<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
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
