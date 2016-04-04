<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

<section id="hero" class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login">
          <div class="text-center"><img src="img/logo_sticky.png" alt="" data-retina="true" ></div>
          <hr>
          <?php $form = ActiveForm::begin([
              'id'                     => 'login-form',
              'enableAjaxValidation'   => true,
              'enableClientValidation' => false,
              'validateOnBlur'         => false,
              'validateOnType'         => false,
              'validateOnChange'       => false,
          ]) ?>

          <?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>

          <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password') . ($module->enablePasswordRecovery ? ' (' . Html::a(Yii::t('user', 'Forgot password?'), ['/request/'], ['tabindex' => '5']) . ')' : '')) ?>

          <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

          <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>

          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
    <?php if ($module->enableConfirmation): ?>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/resend/']) ?>
        </p>
    <?php endif ?>
    <?php if ($module->enableRegistration): ?>
        <p class="text-center">
            <?= Html::a(Yii::t('user', 'Don\'t have an account? Register!'), ['/register/']) ?>
        </p>
    <?php endif ?>
    <?= Connect::widget([
        'baseAuthUrl' => ['/user/security/auth'],
    ]) ?>
  </div>
</section>
