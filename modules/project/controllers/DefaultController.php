<?php

namespace app\modules\project\controllers;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `project` module
 */
class DefaultController extends Controller
{
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
