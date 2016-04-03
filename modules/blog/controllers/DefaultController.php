<?php

namespace app\modules\blog\controllers;
use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
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
