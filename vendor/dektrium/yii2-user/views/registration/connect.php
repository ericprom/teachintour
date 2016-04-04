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
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\User $model
 * @var dektrium\user\models\Account $account
 */

$this->title = Yii::t('user', 'Sign in | '.Yii::$app->params["company_name"].'');
$this->params['breadcrumbs'][] = $this->title;
?>
<section id="hero" class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login">
          <div class="text-center"><img src="img/logo_sticky.png" alt="" data-retina="true" ></div>
          <hr>
          <div class="alert alert-info">
              <p>
                  <?= Yii::t('user', 'In order to finish your registration, we need you to enter following fields') ?>:
              </p>
          </div>
          <?php $form = ActiveForm::begin([
              'id' => 'connect-account-form',
          ]); ?>

          <?= $form->field($model, 'email') ?>

          <?= $form->field($model, 'username') ?>

          <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-success btn-block']) ?>

          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
    <p class="text-center">
        <?= Html::a(Yii::t('user', 'If you already registered, sign in and connect this account on settings page'), ['/user/settings/networks']) ?>.
    </p>
  </div>
</section>
