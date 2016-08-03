<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use app\models\Fees;
use yii\web\Controller;

class FeeController extends Controller
{
  public function actionIndex()
  {
    $request = Yii::$app->request;
    if ($request->isPost) {
      $param = array("filter"=>FALSE);
      foreach ($param as $key => $val) {
          if (isset($_REQUEST[$key])) {
              $param[$key] = $_REQUEST[$key];
          }
      }
      $result = array("status" => FALSE, "data" => "");
      try {
        $options = array();
        if (is_array($param["filter"]) ) {
          $options = $param["filter"];
          if(isset($options["data"])){
            if (gettype($options["data"]) == "string") {
                $data = json_decode($options["data"], TRUE);

            } else {
                $data = json_encode($options["data"]);
                $data = json_decode($data, TRUE);
            }
          }
          switch($options["action"]){
            case "select":
              if($options["section"]=='appy'){
                $fee = Fees::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->asArray()->all();
                $result["data"] = $fee;
                $result["total"] = count($fee);
              }
              if($options["section"]=='all'){
                $fee = Fees::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->asArray()->all();
                $result["data"] = $fee;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "manage":
              if($options["section"]=='all'){
                $fee = Fees::find()->where(['<>','inactive', 1])->asArray()->all();
                $total = Fees::find()->where(['<>','inactive', 1])->all();
                $result["data"] = $fee;
                $result["total"] = count($total);
              }
              if($options["section"]=='detail'){
                $fee = Fees::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                if($fee){
                  $result["data"] = $fee->attributes;
                }
                else{
                  $result["data"] = $fee;
                }
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "create":
              $fee = new Fees();
              (isset($data["title"]))?$fee->title = $data["title"]:$fee->title = '';
              (isset($data["price"]))?$fee->price = $data["price"]:$fee->price = '';
              (isset($data["detail"]))?$fee->detail = $data["detail"]:$fee->detail = '';
              (isset($data["popular"]))?$fee->popular = $data["popular"]:$fee->popular = '';
              (isset($data["shelf"]))?$fee->shelf = $data["shelf"]:$fee->shelf = '';
              (isset($data["available"]))?$fee->available = $data["available"]:$fee->available = 'false';
              $fee->createdAt = time();
              $fee->createdBy = Yii::$app->user->identity->id;
              $fee->save();
              $result["data"] = $fee->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "New program fee has been added.";
              break;
            case "update":
              $fee = Fees::findOne(['id'=>$data["id"]]);
              (isset($data["title"]))?$fee->title = $data["title"]:$fee->title = '';
              (isset($data["price"]))?$fee->price = $data["price"]:$fee->price = '';
              (isset($data["detail"]))?$fee->detail = $data["detail"]:$fee->detail = '';
              (isset($data["popular"]))?$fee->popular = $data["popular"]:$fee->popular = '';
              (isset($data["shelf"]))?$fee->shelf = $data["shelf"]:$fee->shelf = '';
              (isset($data["available"]))?$fee->available = $data["available"]:$fee->available = 'false';
              $fee->updatedAt = time();
              $fee->updatedBy = Yii::$app->user->identity->id;
              $fee->update();
              $result["data"] = $fee->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Program fee has been updated.";
              break;
            case "delete":
              $fee = Fees::findOne(['id'=>$data["id"]]);
              $fee->updatedAt = time();
              $fee->updatedBy = Yii::$app->user->identity->id;
              $fee->inactive = 1;
              $fee->update();
              $result["data"] = $fee->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Program fee has been deleted.";
              break;
          }
        }
      } catch(Exceptions $ex) {
          $result["status"] = FALSE;
          $result["error"] = $ex;
          $result["toast"] = 'warning';
          $result["message"] =  "Oops! Somthing went wrong.";
      }
      echo json_encode($result);
    }
    else{
      echo json_encode(['status' => 0, 'error_code' => 400, 'message' => 'Bad request'], JSON_PRETTY_PRINT);
    }
    exit;
  }
}
