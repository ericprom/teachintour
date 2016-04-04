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

$this->title = Yii::t('user', 'Register | '.Yii::$app->params["company_name"].'');
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="hero" class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login">
        <div class="text-center"><img src="img/logo_sticky.png" alt="" data-retina="true" ></div>
        <hr>
        <?php $form = ActiveForm::begin([
            'id'                     => 'registration-form',
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
        ]); ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'username') ?>

        <?php if ($module->enableGeneratingPassword == false): ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
        <?php endif ?>
        <hr>
          By clicking <span class="label label-success">Register</span>, you agree to the Teachin' Tour's <?=Html::a('Terms and Conditions', ['/terms/'],['data' => ['method' => 'post']]);?> set out by this site, including our Cookie Use.
        <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-success btn-block']) ?>

        <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </div>
</section>



