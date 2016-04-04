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

<section id="hero" class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login">
          <div class="text-center"><img src="img/logo_sticky.png" alt="" data-retina="true" ></div>
          <hr>
          <?php $form = ActiveForm::begin([
              'id'                     => 'resend-form',
              'enableAjaxValidation'   => true,
              'enableClientValidation' => false,
          ]); ?>

          <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

          <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>

          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
