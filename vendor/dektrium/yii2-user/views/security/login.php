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
<section id="content">
  <div class="content-wrap nopadding">
    <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>
    <div class="section full-screen nopadding nomargin">
      <div class="container vertical-middle divcenter clearfix">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12"></div>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="well">
            <?php $form = ActiveForm::begin([
                'id'                     => 'login-form',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
                'validateOnBlur'         => false,
                'validateOnType'         => false,
                'validateOnChange'       => false,
            ]) ?>
              <h3>Login to your Account</h3>

              <div class="col_full">
              <?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control not-dark', 'tabindex' => '1']]) ?>
              </div>

              <div class="col_full">
                <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password') . ($module->enablePasswordRecovery ? ' (' . Html::a(Yii::t('user', 'Forgot password?'), ['/request/'], ['tabindex' => '5']) . ')' : '')) ?>
              </div>

              <div class="col_full nobottommargin">
                <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>
              </div>
            <?php ActiveForm::end(); ?>

            <div class="line line-sm"></div>

            <div class="center">
              <?php if ($module->enableConfirmation): ?>
                  <div>
                      <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/resend/']) ?>
                  </div>
              <?php endif ?>
              <?php if ($module->enableRegistration): ?>
                  <div>
                      <?= Html::a(Yii::t('user', 'Don\'t have an account? Register!'), ['/register/']) ?>
                  </div>
              <?php endif ?>
              <?= Connect::widget([
                  'baseAuthUrl' => ['/user/security/auth'],
              ]) ?>
            </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- #content end -->

