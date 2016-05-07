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

/*
 * @var yii\web\View                    $this
 * @var dektrium\user\models\ResendForm $model
 */

$this->title = Yii::t('user', 'Request new confirmation message');
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
            <?php $form = ActiveForm::begin([
                'id'                     => 'resend-form',
                'enableAjaxValidation'   => true,
                'enableClientValidation' => false,
            ]); ?>
            <h3>Resend confirmation email</h3>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>

            <?php ActiveForm::end(); ?>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12"></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- #content end -->
