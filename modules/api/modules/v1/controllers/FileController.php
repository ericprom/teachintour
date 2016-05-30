<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use yii\web\Controller;

class FileController extends Controller
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
              $result["data"] =  $this->selectFile($options["folder"],$options["section"],$options["location"]);
              $result["total"] =  count($this->selectFile($options["folder"],$options["section"],$options["location"]));
              $result["status"] = TRUE;
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
      $folder = @$_GET['folder'];
      $section = @$_GET['section'];
      $location = @$_GET['location'];
      if (!empty($_FILES)) {
        $fileName = $_FILES['file']['name'];
        $tempFile = $_FILES['file']['tmp_name'];
        $albumPath = Yii::getAlias('@webroot') .'/images/'.$folder.'/'.$section.'/'.$location.'/';
         if(!is_dir($albumPath)){
            $mode = 0755;
            mkdir($albumPath, $mode, TRUE);
        }
        $targetPath = $albumPath;
        $targetFile =  $targetPath.$fileName;
        move_uploaded_file($tempFile,$targetFile);
      }
    } catch(Exception $ex) {}
    exit;
  }
  private function selectFile($folder,$section,$location)
  {
    $image = array();
    $realPath = Yii::getAlias('@webroot') .'/images/'.$folder.'/'.$section.'/'.$location.'/';
    foreach(glob($realPath.'*.*') as $key => $value){
         $image[$key]["image_path"] = Yii::$app->assetManager->publish($value);
         $image[$key]["original_path"] = $value;
         $image[$key]["key_path"] = md5($value);
    }
    return $image;
  }
}
