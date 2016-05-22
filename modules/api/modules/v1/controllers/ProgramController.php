<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use app\models\Programs;
use yii\web\Controller;

class ProgramController extends Controller
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
            case "manage":
              if($options["section"]=='all'){
                $program = Programs::find()->where(['<>','inactive', 1])->asArray()->all();
                $total = Programs::find()->where(['<>','inactive', 1])->all();
                $result["data"] = $program;
                $result["total"] = count($total);
              }
              if($options["section"]=='detail'){
                $program = Programs::find()->where(['and', ['<>','inactive', 1], ['=','id', $data["id"]]])->one();
                $result["data"] = $program->attributes;
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "select":
              if($options["section"]=='detail'){
                $program = Programs::find()->where(['and', ['<>','inactive', 1],['=','status', 1], ['=','id', $data["id"]]])->with('schedule','condition')->asArray()->all();
                $program_pdf_cover = Array();
                $coverPath = Yii::getAlias('@webroot') .'/images/covers/default.jpg';
                foreach($program as $key => $value){
                   if($value["cover"]!=null){
                    $value["cover"] = Yii::$app->assetManager->publish($value["cover"]);
                  }
                  else{
                    $value["cover"] = Yii::$app->assetManager->publish($coverPath);
                  }
                  if($value["pdf"]!=null){
                    $value["pdf"] = Yii::$app->assetManager->publish($value["pdf"]);
                  }
                  else{
                    $value["pdf"] = null;
                  }
                  $program_pdf_cover[] = $value;
                }
                $result["data"] = $program_pdf_cover;
              }
             if($options["section"]=='all'){
                $program = Programs::find()->where(['and', ['<>','inactive', 1],['=','status', 1]])->limit($options["limit"])->offset($options["skip"])->asArray()->all();
                $program_pdf_cover = Array();

                $coverPath = Yii::getAlias('@webroot') .'/images/covers/default.jpg';
                foreach($program as $key => $value){
                  if($value["cover"]!=null){
                    $value["cover"] = Yii::$app->assetManager->publish($value["cover"]);
                  }
                  else{
                    $value["cover"] = Yii::$app->assetManager->publish($coverPath);
                  }
                  if($value["pdf"]!=null){
                    $value["pdf"] = Yii::$app->assetManager->publish($value["pdf"]);
                  }
                  else{
                    $value["pdf"] = null;
                  }
                  $program_pdf_cover[] = $value;
                }
                $total = Programs::find()->where(['<>','inactive', 1])->all();
                $result["data"] = $program_pdf_cover;
                $result["total"] = count($total);
              }
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              break;
            case "create":
              $program = new Programs();
              (isset($data["name"]))?$program->name = $data["name"]:$program->name = '';
              (isset($data["highlight"]))?$program->highlight = $data["highlight"]:$program->highlight = '';
              (isset($data["range"]))?$program->range = $data["range"]:$program->range = '';
              (isset($data["duration"]))?$program->duration = $data["duration"]:$program->duration = '';
              (isset($data["price"]))?$program->price = $data["price"]:$program->price = '';
              $program->createdAt = time();
              $program->createdBy = Yii::$app->user->identity->id;
              $program->status = 1;
              $program->save();
              $result["data"] = $program->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "บันทึกข้อมูลเรียบร้อย";
              break;
            case "update":
              $program = Programs::findOne(['id'=>$data["id"]]);
              if($options["section"]=='detail'){
                (isset($data["name"]))?$program->name = $data["name"]:$program->name = '';
                (isset($data["highlight"]))?$program->highlight = $data["highlight"]:$program->highlight = '';
                (isset($data["range"]))?$program->range = $data["range"]:$program->range = '';
                (isset($data["duration"]))?$program->duration = $data["duration"]:$program->duration = '';
                (isset($data["price"]))?$program->price = $data["price"]:$program->price = '';
                (isset($data["status"]))?$program->status = $data["status"]:$program->status = 1;
              }
              if($options["section"]=='cover'){
                (isset($data["cover"]))?$program->cover = $data["cover"]:$program->cover = '';
              }
              if($options["section"]=='pdf'){
                (isset($data["pdf"]))?$program->pdf = $data["pdf"]:$program->pdf = '';
              }
              $program->updatedAt = time();
              $program->updatedBy = Yii::$app->user->identity->id;
              $program->update();
              $result["data"] = $program->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "อัพเดทข้อมูลเรียบร้อย";
              break;
            case "delete":
              $program = Programs::findOne(['id'=>$data["id"]]);
              $program->updatedAt = time();
              $program->updatedBy = Yii::$app->user->identity->id;
              $program->inactive = 1;
              $program->update();
              $result["data"] = $program->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "ระบบลบโปรแกรมเรียบร้อย";
              break;
            case "setting":
              $program = Programs::findOne(['id'=>$data["id"]]);
              (isset($data["status"]))?$program->status = $data["status"]:$program->status = 1;
              $program->updatedAt = time();
              $program->updatedBy = Yii::$app->user->identity->id;
              $program->update();
              $result["data"] = $program->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "อัพเดทการแสดงผลเรียบร้อย";
              break;
            case "unlink":
              unlink($options["path"]);
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] = "ลบข้อมูลเรียบร้อย";
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

  public function actionUpload()
  {
    try{
      $tag = @$_GET['tag'];
      $folder = @$_GET['folder'];
      if($tag=='covers'){
        if (!empty($_FILES)) {
          $fileName = $_FILES['file']['name'];
          $tempFile = $_FILES['file']['tmp_name'];
          $albumPath = Yii::getAlias('@webroot') .'/images/covers/'.$folder.'/';
           if(!is_dir($albumPath)){
              $mode = 0755;
              mkdir($albumPath, $mode, TRUE);
          }
          $targetPath = $albumPath;
          $targetFile =  $targetPath.$fileName;
          move_uploaded_file($tempFile,$targetFile);
        }
      }

      if($tag=='pdfs'){
        if (!empty($_FILES)) {
          $fileName = $_FILES['file']['name'];
          $tempFile = $_FILES['file']['tmp_name'];
          $pdfPath = Yii::getAlias('@webroot') .'/pdfs/'.$folder.'/';
           if(!is_dir($pdfPath)){
              $mode = 0755;
              mkdir($pdfPath, $mode, TRUE);
          }
          $targetPath = $pdfPath;
          $targetFile =  $targetPath.$fileName;
          move_uploaded_file($tempFile,$targetFile);
        }
      }
    } catch(Exception $ex) {}
    exit;
  }
  public function actionFiles()
  {
    $request = Yii::$app->request;
    if ($request->isPost) {
      $param = array("filter"=>FALSE);
      foreach ($param as $key => $val) {
          if (isset($_REQUEST[$key])) {
              $param[$key] = $_REQUEST[$key];
          }
      }
      $result = array("status" => FALSE, "data" => array() , "total"=>0);
      try {
          $options = array();
          if (is_array($param["filter"]) ) {
              $options = $param["filter"];
              if($options["section"]=='covers'){
                $image = array();
                $realPath = Yii::getAlias('@webroot') .'/images/covers/'.$options["programID"].'/';
                foreach(glob($realPath.'*.*') as $key => $value){
                     $image[$key]["image_path"] = Yii::$app->assetManager->publish($value);
                     $image[$key]["original_path"] = $value;
                     $image[$key]["key_path"] = md5($value);
                }
                $result["data"] =  $image;
                $result["total"] =  count($image);
              }
              if($options["section"]=='pdfs'){
                $pdf = array();
                $realPath = Yii::getAlias('@webroot') .'/pdfs/'.$options["programID"].'/';
                foreach(glob($realPath.'*.*') as $key => $value){
                     $pdf[$key]["pdf_path"] = Yii::$app->assetManager->publish($value);
                     $pdf[$key]["original_path"] = $value;
                     $pdf[$key]["key_path"] = md5($value);
                }
                $result["data"] =  $pdf;
                $result["total"] =  count($pdf);
              }
              $result["status"] = TRUE;
          }
      } catch(Exception $ex) {}
      echo json_encode($result);
    }
    else{
      echo json_encode(['status' => 0, 'error_code' => 400, 'message' => 'Bad request'], JSON_PRETTY_PRINT);
    }
  }
}
