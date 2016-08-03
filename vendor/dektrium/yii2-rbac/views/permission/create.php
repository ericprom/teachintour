<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var $model dektrium\rbac\models\Role
 * @var $this  yii\web\View
 */

$this->title = Yii::t('rbac', 'Create new permission');
$this->params['breadcrumbs'][] = $this->title;

?>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <?php $this->beginContent('@dektrium/rbac/views/layout.php') ?>

      <?= $this->render('_form', [
          'model' => $model,
      ]) ?>

      <?php $this->endContent() ?>
    </div>
  </div>
</section>
