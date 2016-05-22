<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class MailerController extends Controller
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
            case "contact":
              $message = "<b>".$data["firstname"]." ".$data["lastname"]."</b><br>";
              $message .= "<b>อีเมล์:</b> ".$data["from"]."<br>";
              $message .= "<b>โทร:</b> ".$data["phone"]."<br>";
              $message .= "<b>ข้อความ:</b> ".$data["body"]."<br>";
              $mail = Yii::$app->mailer->compose()
                ->setFrom($data["from"])
                ->setTo(Yii::$app->params['contact_email'])
                ->setSubject($data["subject"])
                ->setHtmlBody($message)
                ->send();
              $result["toast"] = 'success';
              $result["status"] =$mail;
              $result["message"] =  "ส่งข้อมูลเรียบร้อย";
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
