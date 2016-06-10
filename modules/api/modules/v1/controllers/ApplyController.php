<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use app\models\Applications;
use yii\web\Controller;

class ApplyController extends Controller
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
                $application = Applications::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->asArray()->all();
                $total = Applications::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->all();
                $program_cover = Array();
                $coverPath = Yii::getAlias('@webroot') .'/images/Applications/covers/default.jpg';
                foreach($application as $key => $value){
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
                $application = Applications::find()->where(['and', ['<>','inactive', 1],['=','available', 'true'],['=','id', $data["id"]]])->one();
                $coverPath = Yii::getAlias('@webroot') .'/images/Applications/covers/default.jpg';
                if($application->cover!=null){
                  $application->cover = Yii::$app->assetManager->publish($application->cover);
                }
                else{
                  $application->cover = Yii::$app->assetManager->publish($coverPath);
                }
                $result["data"] = $application->attributes;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "manage":
              if($options["section"]=='all'){
                $application = Applications::find()->where(['<>','inactive', 1])->asArray()->all();
                $total = Applications::find()->where(['<>','inactive', 1])->all();
                $program_cover = Array();
                $coverPath = Yii::getAlias('@webroot') .'/images/Applications/covers/default.jpg';
                foreach($application as $key => $value){
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
                $application = Applications::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $result["data"] = $application->attributes;
              }
              if($options["section"]=='preview'){
                $application = Applications::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $coverPath = Yii::getAlias('@webroot') .'/images/Applications/covers/default.jpg';
                if($application->cover!=null){
                  $application->cover = Yii::$app->assetManager->publish($application->cover);
                }
                else{
                  $application->cover = Yii::$app->assetManager->publish($coverPath);
                }
                $result["data"] = $application->attributes;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "create":
              $application = new Applications();
              (isset($data["title"]))?$application->title = $data["title"]:$application->title = '';
              (isset($data["detail"]))?$application->detail = $data["detail"]:$application->detail = '';
              (isset($data["available"]))?$application->available = $data["available"]:$application->available = 'false';
              $application->createdAt = time();
              $application->createdBy = Yii::$app->user->identity->id;
              $application->save();
              $result["data"] = $application->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "บันทึกข้อมูลเรียบร้อย";
              break;
            case "update":
              $application = Applications::findOne(['id'=>$data["id"]]);
              if($options["section"]=='detail'){
                (isset($data["title"]))?$application->title = $data["title"]:$application->title = '';
                (isset($data["detail"]))?$application->detail = $data["detail"]:$application->detail = '';
                (isset($data["available"]))?$application->available = $data["available"]:$application->available = 'false';
              }
              if($options["section"]=='cover'){
                (isset($data["cover"]))?$application->cover = $data["cover"]:$application->cover = '';
              }
              $application->updatedAt = time();
              $application->updatedBy = Yii::$app->user->identity->id;
              $application->update();
              $result["data"] = $application->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "อัพเดทข้อมูลเรียบร้อย";
              break;
            case "delete":
              $application = Applications::findOne(['id'=>$data["id"]]);
              $application->updatedAt = time();
              $application->updatedBy = Yii::$app->user->identity->id;
              $application->inactive = 1;
              $application->update();
              $result["data"] = $application->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "ระบบลบโปรแกรมเรียบร้อย";
              break;
            case "test":
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "ระบบลบโปรแกรมเรียบร้อย";
              break;
          }
        }
      } catch(Exceptions $ex) {
          $result["status"] = FALSE;
          $result["error"] = $ex;
          $result["message"] =  "เกิดข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้";
      }
      echo json_encode($result);
    }
    else{
      echo json_encode(['status' => 0, 'error_code' => 400, 'message' => 'Bad request'], JSON_PRETTY_PRINT);
    }
    exit;
  }
}
