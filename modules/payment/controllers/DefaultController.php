<?php

namespace app\modules\payment\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `payment` module
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
      $request = Yii::$app->request;
      $id = $request->get('id');
      if($id){
        return $this->render('detail');
      }
      else{
        return $this->render('index');
      }
    }
}
