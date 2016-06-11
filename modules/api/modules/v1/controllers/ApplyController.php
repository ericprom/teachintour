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
            case "create":
              $application = new Applications();
              (isset($data["personal"]["firstname"]))?$application->firstname = $data["personal"]["firstname"]:$application->firstname = '';
              (isset($data["personal"]["lastname"]))?$application->lastname = $data["personal"]["lastname"]:$application->lastname = '';
              (isset($data["personal"]["nationality"]))?$application->nationality = $data["personal"]["nationality"]:$application->nationality = '';
              (isset($data["personal"]["date_of_birth"]))?$application->date_of_birth = $data["personal"]["date_of_birth"]:$application->date_of_birth = null;
              (isset($data["personal"]["gender"]))?$application->gender = $data["personal"]["gender"]:$application->gender = 0;
              (isset($data["personal"]["email"]))?$application->email = $data["personal"]["email"]:$application->email = '';
              (isset($data["personal"]["phone"]))?$application->phone = $data["personal"]["phone"]:$application->phone = '';
              (isset($data["personal"]["line"]))?$application->line = $data["personal"]["line"]:$application->line = '';
              (isset($data["personal"]["facebook"]))?$application->facebook = $data["personal"]["facebook"]:$application->facebook = '';
              (isset($data["personal"]["skype"]))?$application->skype = $data["personal"]["skype"]:$application->skype = '';
              (isset($data["address"]["street"]))?$application->street = $data["address"]["street"]:$application->street = '';
              (isset($data["address"]["city"]))?$application->city = $data["address"]["city"]:$application->city = '';
              (isset($data["address"]["state"]))?$application->state = $data["address"]["state"]:$application->state = '';
              (isset($data["address"]["zipcode"]))?$application->zipcode = $data["address"]["zipcode"]:$application->zipcode = '';
              (isset($data["address"]["country"]))?$application->country = $data["address"]["country"]:$application->country = '';
              (isset($data["tour"]["location_id"]))?$application->location_id = $data["tour"]["location_id"]:$application->location_id = 0;
              (isset($data["tour"]["program_id"]))?$application->program_id = $data["tour"]["program_id"]:$application->program_id = 0;
              (isset($data["tour"]["start_date"]))?$application->start_date = $data["tour"]["start_date"]:$application->start_date = null;
              (isset($data["other"]["education"]))?$application->education = $data["other"]["education"]:$application->education = '';
              (isset($data["other"]["experience"]))?$application->experience = $data["other"]["experience"]:$application->experience = '';
              (isset($data["other"]["language"]))?$application->language = $data["other"]["language"]:$application->language = '';
              (isset($data["other"]["skill"]))?$application->skill = $data["other"]["skill"]:$application->skill = '';
              (isset($data["emergency"]["emergency"]))?$application->emergency = $data["emergency"]["emergency"]:$application->emergency = '';
              (isset($data["background"]["violation"]))?$application->violation = $data["background"]["violation"]:$application->violation = '';
              (isset($data["background"]["violation_detail"]))?$application->violation_detail = $data["background"]["violation_detail"]:$application->violation_detail = '';
              (isset($data["background"]["criminal"]))?$application->criminal = $data["background"]["criminal"]:$application->criminal = '';
              (isset($data["background"]["criminal_detail"]))?$application->criminal_detail = $data["background"]["criminal_detail"]:$application->criminal_detail = '';
              (isset($data["agreement"]))?$application->agreement = $data["agreement"]:$application->agreement = 1;
              $application->createdAt = time();
              $application->createdBy = Yii::$app->user->identity->id;
              $application->save();
              $result["data"] = $application->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Your form has been summited for review.";
              break;
            case "update":
              $application = Applications::findOne(['id'=>$data["id"]]);
              (isset($data["personal"]["firstname"]))?$application->firstname = $data["personal"]["firstname"]:$application->firstname = '';
              (isset($data["personal"]["lastname"]))?$application->lastname = $data["personal"]["lastname"]:$application->lastname = '';
              (isset($data["personal"]["nationality"]))?$application->nationality = $data["personal"]["nationality"]:$application->nationality = '';
              (isset($data["personal"]["date_of_birth"]))?$application->date_of_birth = $data["personal"]["date_of_birth"]:$application->date_of_birth = null;
              (isset($data["personal"]["gender"]))?$application->gender = $data["personal"]["gender"]:$application->gender = 0;
              (isset($data["personal"]["email"]))?$application->email = $data["personal"]["email"]:$application->email = '';
              (isset($data["personal"]["phone"]))?$application->phone = $data["personal"]["phone"]:$application->phone = '';
              (isset($data["personal"]["line"]))?$application->line = $data["personal"]["line"]:$application->line = '';
              (isset($data["personal"]["facebook"]))?$application->facebook = $data["personal"]["facebook"]:$application->facebook = '';
              (isset($data["personal"]["skype"]))?$application->skype = $data["personal"]["skype"]:$application->skype = '';
              (isset($data["address"]["street"]))?$application->street = $data["address"]["street"]:$application->street = '';
              (isset($data["address"]["city"]))?$application->city = $data["address"]["city"]:$application->city = '';
              (isset($data["address"]["state"]))?$application->state = $data["address"]["state"]:$application->state = '';
              (isset($data["address"]["zipcode"]))?$application->zipcode = $data["address"]["zipcode"]:$application->zipcode = '';
              (isset($data["address"]["country"]))?$application->country = $data["address"]["country"]:$application->country = '';
              (isset($data["tour"]["location_id"]))?$application->location_id = $data["tour"]["location_id"]:$application->location_id = 0;
              (isset($data["tour"]["program_id"]))?$application->program_id = $data["tour"]["program_id"]:$application->program_id = 0;
              (isset($data["tour"]["start_date"]))?$application->start_date = $data["tour"]["start_date"]:$application->start_date = null;
              (isset($data["other"]["education"]))?$application->education = $data["other"]["education"]:$application->education = '';
              (isset($data["other"]["experience"]))?$application->experience = $data["other"]["experience"]:$application->experience = '';
              (isset($data["other"]["language"]))?$application->language = $data["other"]["language"]:$application->language = '';
              (isset($data["other"]["skill"]))?$application->skill = $data["other"]["skill"]:$application->skill = '';
              (isset($data["emergency"]["emergency"]))?$application->emergency = $data["emergency"]["emergency"]:$application->emergency = '';
              (isset($data["background"]["violation"]))?$application->violation = $data["background"]["violation"]:$application->violation = '';
              (isset($data["background"]["violation_detail"]))?$application->violation_detail = $data["background"]["violation_detail"]:$application->violation_detail = '';
              (isset($data["background"]["criminal"]))?$application->criminal = $data["background"]["criminal"]:$application->criminal = '';
              (isset($data["background"]["criminal_detail"]))?$application->criminal_detail = $data["background"]["criminal_detail"]:$application->criminal_detail = '';
              $application->updatedAt = time();
              $application->updatedBy = Yii::$app->user->identity->id;
              $application->update();
              $result["data"] = $application->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "Your form has been update and wait for review.";
              break;
            case "approve":
              $application = Applications::findOne(['id'=>$data["id"]]);
              (isset($data["approval"]))?$application->approval = $data["approval"]:$application->approval = 0;
              $application->approvedAt = time();
              $application->approvedBy = Yii::$app->user->identity->id;
              $application->update();
              $result["data"] = $application->attributes;
              $result["toast"] = 'success';
              $result["status"] = TRUE;
              $result["message"] =  "This application has deleted.";
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
              $result["message"] =  "This application has deleted.";
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
