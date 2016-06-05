<?php

namespace app\modules\setting\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `setting` module
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
                        'actions' => ['index','project', 'location', 'fee','application'],
                        'allow' => true,
                        'roles' => ['Admin'],
                    ],
                    // [
                    //     'actions' => ['insert'],
                    //     'allow' => true,
                    //     'roles' => ['?', '@', 'admin'],
                    // ],
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
    public function actionProject()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $page = $request->get('page');
        if($page){
          return $this->render('project/'.$page);
        }
        else{
          if($id){
            return $this->render('project/detail');
          }
          else{
            return $this->render('project/list');
          }
        }
    }
    public function actionLocation()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $page = $request->get('page');
        if($page){
          return $this->render('location/'.$page);
        }
        else{
          if($id){
            return $this->render('location/detail');
          }
          else{
            return $this->render('location/list');
          }
        }
    }
    public function actionFee()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $page = $request->get('page');
        if($page){
          return $this->render('fee/'.$page);
        }
        else{
          if($id){
            return $this->render('fee/detail');
          }
          else{
            return $this->render('fee/list');
          }
        }
    }
    public function actionApplication()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $page = $request->get('page');
        if($page){
          return $this->render('application/'.$page);
        }
        else{
          if($id){
            return $this->render('application/detail');
          }
          else{
            return $this->render('application/list');
          }
        }
    }
}
