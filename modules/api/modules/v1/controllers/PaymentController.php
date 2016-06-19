<?php

namespace app\modules\api\modules\v1\controllers;

use Yii;
// use app\models\Applications;
use yii\web\Controller;
use OmiseCharge;

class PaymentController extends Controller
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
            case "pay":
              $userID = Yii::$app->user->identity->id;
              $card = array(
                'amount'=> $data['amount'],
                'currency'    => 'thb',
                'description' => 'User#'.$userID.'-'.$data['description'],
                'card' => $data['omise_token']
              );
              $charge = OmiseCharge::create($card);
              $result["data"] = $charge;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Payment completed.";
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
