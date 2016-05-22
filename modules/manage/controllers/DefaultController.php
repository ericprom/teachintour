<?php

namespace app\modules\manage\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `manage` module
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
                        'actions' => ['index','project'],
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
        $page = $request->get('page');
        if($page){
          return $this->render($page);
        }
        else{
          return $this->render('project');
        }
    }
}
