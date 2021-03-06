<?php

namespace app\modules\apply\controllers;

use yii\web\Controller;

/**
 * Default controller for the `apply` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
      return [
        'access' => [
          'class' => \yii\filters\AccessControl::className(),
          'ruleConfig' => [
              'class' => \yii\filters\AccessRule::className(),
          ],
          'rules' => [
            [
              'actions' => ['index'],
              'allow' => true,
              'roles' => ['@'],
            ],
            [
              'actions' => ['login'],
              'allow' => true,
              'roles' => ['?'],
            ],
          ],
        ],
      ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
