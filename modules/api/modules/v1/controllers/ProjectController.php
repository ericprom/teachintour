<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use app\models\Projects;
use yii\web\Controller;

class ProjectController extends Controller
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
                $project = Projects::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->asArray()->all();
                $result["data"] = $project;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "manage":
              if($options["section"]=='all'){
                $project = Projects::find()->where(['<>','inactive', 1])->asArray()->all();
                $total = Projects::find()->where(['<>','inactive', 1])->all();
                $result["data"] = $project;
                $result["total"] = count($total);
              }
              if($options["section"]=='detail'){
                $project = Projects::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $result["data"] = $project->attributes;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "create":
              $project = new Projects();
              (isset($data["title"]))?$project->title = $data["title"]:$project->title = '';
              (isset($data["detail"]))?$project->detail = $data["detail"]:$project->detail = '';
              (isset($data["available"]))?$project->available = $data["available"]:$project->available = 'false';
              $project->createdAt = time();
              $project->createdBy = Yii::$app->user->identity->id;
              $project->save();
              $result["data"] = $project->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "บันทึกข้อมูลเรียบร้อย";
              break;
            case "update":
              $project = Projects::findOne(['id'=>$data["id"]]);
              (isset($data["title"]))?$project->title = $data["title"]:$project->title = '';
              (isset($data["detail"]))?$project->detail = $data["detail"]:$project->detail = '';
              (isset($data["available"]))?$project->available = $data["available"]:$project->available = 'false';
              $project->updatedAt = time();
              $project->updatedBy = Yii::$app->user->identity->id;
              $project->update();
              $result["data"] = $project->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "อัพเดทข้อมูลเรียบร้อย";
              break;
            case "delete":
              $project = Projects::findOne(['id'=>$data["id"]]);
              $project->updatedAt = time();
              $project->updatedBy = Yii::$app->user->identity->id;
              $project->inactive = 1;
              $project->update();
              $result["data"] = $project->attributes;
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
