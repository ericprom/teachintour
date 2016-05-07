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
<section id="content">
  <div class="content-wrap nopadding">
    <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>
    <div class="section full-screen nopadding nomargin">
      <div class="container vertical-middle divcenter clearfix">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12"></div>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="well">
              <div class="alert alert-info">
                  <p>
                      <?= Yii::t('user', 'In order to finish your registration, we need you to enter following fields') ?>:
                  </p>
              </div>
              <?php $form = ActiveForm::begin([
                  'id' => 'connect-account-form',
              ]); ?>
              <h3>Connect Accounts</h3>
              <?= $form->field($model, 'email') ?>

              <?= $form->field($model, 'username') ?>

              <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-success btn-block']) ?>

              <?php ActiveForm::end(); ?>
              <p class="text-center">
                  <?= Html::a(Yii::t('user', 'If you already registered, sign in and connect this account on settings page'), ['/user/settings/networks']) ?>.
              </p>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- #content end -->
