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
              if($options["section"]=='appy'){
                $project = Projects::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->asArray()->all();
                $result["data"] = $project;
                $result["total"] = count($project);
              }
              if($options["section"]=='all'){
                $project = Projects::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->asArray()->all();
                $total = Projects::find()->where(['and', ['<>','inactive', 1],['=','available', 'true']])->all();
                $program_cover = Array();
                $coverPath = Yii::getAlias('@webroot') .'/images/projects/covers/default.jpg';
                foreach($project as $key => $value){
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
                $project = Projects::find()->where(['and', ['<>','inactive', 1],['=','available', 'true'],['=','id', $data["id"]]])->one();
                $coverPath = Yii::getAlias('@webroot') .'/images/projects/covers/default.jpg';
                if($project->cover!=null){
                  $project->cover = Yii::$app->assetManager->publish($project->cover);
                }
                else{
                  $project->cover = Yii::$app->assetManager->publish($coverPath);
                }
                $result["data"] = $project->attributes;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "manage":
              if($options["section"]=='all'){
                $project = Projects::find()->where(['<>','inactive', 1])->asArray()->all();
                $total = Projects::find()->where(['<>','inactive', 1])->all();
                $program_cover = Array();
                $coverPath = Yii::getAlias('@webroot') .'/images/projects/covers/default.jpg';
                foreach($project as $key => $value){
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
                $project = Projects::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $result["data"] = $project->attributes;
              }
              if($options["section"]=='preview'){
                $project = Projects::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $coverPath = Yii::getAlias('@webroot') .'/images/projects/covers/default.jpg';
                if($project->cover!=null){
                  $project->cover = Yii::$app->assetManager->publish($project->cover);
                }
                else{
                  $project->cover = Yii::$app->assetManager->publish($coverPath);
                }
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
              $result["message"] =  "Project fee has been added.";
              break;
            case "update":
              $project = Projects::findOne(['id'=>$data["id"]]);
              if($options["section"]=='detail'){
                (isset($data["title"]))?$project->title = $data["title"]:$project->title = '';
                (isset($data["detail"]))?$project->detail = $data["detail"]:$project->detail = '';
                (isset($data["available"]))?$project->available = $data["available"]:$project->available = 'false';
              }
              if($options["section"]=='cover'){
                (isset($data["cover"]))?$project->cover = $data["cover"]:$project->cover = '';
              }
              $project->updatedAt = time();
              $project->updatedBy = Yii::$app->user->identity->id;
              $project->update();
              $result["data"] = $project->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Project fee has been updated.";
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
              $result["message"] =  "Project fee has been deleted.";
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
