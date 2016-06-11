<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use app\models\Locations;
use yii\web\Controller;

class LocationController extends Controller
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
              if($options["section"]=='all'){
                $location = Locations::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->asArray()->all();
                $total = Locations::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->all();
                $program_cover = Array();
                $coverPath = Yii::getAlias('@webroot') .'/images/locations/covers/default.jpg';
                foreach($location as $key => $value){
                   if($value["cover"]!=null){
                    $value["cover"] = Yii::$app->assetManager->publish($value["cover"]);
                  }
                  else{
                    $value["cover"] = Yii::$app->assetManager->publish($coverPath);
                  }
                  $program_cover[] = $value;
                }
                $result["data"] = $program_cover;
                $result["total"] = count($total);
              }
              if($options["section"]=='detail'){
                $location = Locations::find()->where(['and', ['<>','inactive', 1],['=','available', 'true'],['=','id', $data["id"]]])->one();
                $coverPath = Yii::getAlias('@webroot') .'/images/locations/covers/default.jpg';
                if($location->cover!=null){
                  $location->cover = Yii::$app->assetManager->publish($location->cover);
                }
                else{
                  $location->cover = Yii::$app->assetManager->publish($coverPath);
                }
                $result["data"] = $location->attributes;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "manage":
              if($options["section"]=='all'){
                $location = Locations::find()->where(['<>','inactive', 1])->asArray()->all();
                $total = Locations::find()->where(['<>','inactive', 1])->all();
                $program_cover = Array();
                $coverPath = Yii::getAlias('@webroot') .'/images/locations/covers/default.jpg';
                foreach($location as $key => $value){
                   if($value["cover"]!=null){
                    $value["cover"] = Yii::$app->assetManager->publish($value["cover"]);
                  }
                  else{
                    $value["cover"] = Yii::$app->assetManager->publish($coverPath);
                  }
                  $program_cover[] = $value;
                }
                $result["data"] = $program_cover;
                $result["total"] = count($total);
              }
              if($options["section"]=='detail'){
                $location = Locations::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $result["data"] = $location->attributes;
              }
              if($options["section"]=='preview'){
                $location = Locations::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $coverPath = Yii::getAlias('@webroot') .'/images/locations/covers/default.jpg';
                if($location->cover!=null){
                  $location->cover = Yii::$app->assetManager->publish($location->cover);
                }
                else{
                  $location->cover = Yii::$app->assetManager->publish($coverPath);
                }
                $result["data"] = $location->attributes;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "create":
              $location = new Locations();
              (isset($data["title"]))?$location->title = $data["title"]:$location->title = '';
              (isset($data["detail"]))?$location->detail = $data["detail"]:$location->detail = '';
              (isset($data["available"]))?$location->available = $data["available"]:$location->available = 'false';
              $location->createdAt = time();
              $location->createdBy = Yii::$app->user->identity->id;
              $location->save();
              $result["data"] = $location->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Location fee has been added.";
              break;
            case "update":
              $location = Locations::findOne(['id'=>$data["id"]]);
              if($options["section"]=='detail'){
                (isset($data["title"]))?$location->title = $data["title"]:$location->title = '';
                (isset($data["detail"]))?$location->detail = $data["detail"]:$location->detail = '';
                (isset($data["available"]))?$location->available = $data["available"]:$location->available = 'false';
              }
              if($options["section"]=='cover'){
                (isset($data["cover"]))?$location->cover = $data["cover"]:$location->cover = '';
              }
              $location->updatedAt = time();
              $location->updatedBy = Yii::$app->user->identity->id;
              $location->update();
              $result["data"] = $location->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Location fee has been updated.";
              break;
            case "delete":
              $location = Locations::findOne(['id'=>$data["id"]]);
              $location->updatedAt = time();
              $location->updatedBy = Yii::$app->user->identity->id;
              $location->inactive = 1;
              $location->update();
              $result["data"] = $location->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Location fee has been deleted.";
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
