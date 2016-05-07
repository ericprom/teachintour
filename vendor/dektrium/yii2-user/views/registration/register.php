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
<section id="content">
  <div class="content-wrap nopadding">
    <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>
    <div class="section full-screen nopadding nomargin">
      <div class="container vertical-middle divcenter clearfix">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12"></div>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <?php $form = ActiveForm::begin([
                'id'                     => 'registration-form',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
            ]); ?>
              <h3>Don't have an Account? Register Now.</h3>

              <div class="col_full">
              <?= $form->field($model, 'email') ?>
              </div>
              <div class="col_full">
                <?= $form->field($model, 'username') ?>
              </div>
              <div class="col_full">
                <?php if ($module->enableGeneratingPassword == false): ?>
                  <?= $form->field($model, 'password')->passwordInput() ?>
              <?php endif ?>
              </div>

              <div class="col_full nobottommargin">
                <hr>
                By clicking <span class="label label-success">Register</span>, you agree to the Teachin' Tour's <?=Html::a('Terms and Conditions', ['/terms/'],['data' => ['method' => 'post']]);?> set out by this site, including our Cookie Use.
              <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-success btn-block']) ?>
              </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- #content end -->


