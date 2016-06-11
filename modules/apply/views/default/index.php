<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Apply Online | '.Yii::$app->params["company_name"].'';
?>
<style type="text/css">
  .selectpicker{
    height: 41px; border: 2px solid #DDD;
  }
</style>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">VOLUNTEER APPLICATION <span> FORM</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="ApplyOnlineController" ng-cloak>
  <div class="content-wrap">
    <form>
    <div class="container clearfix">
      <!-- <div class="alert alert-warning" role="alert">
        <center>*PLEASE FILL IN ALL OF THE REQUIRED FIELDS*</center>
      </div> -->
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="fancy-title title-bottom-border">
            <h3 class="">PERSONAL DETAILS</h3>
          </div>
            <div class="col_half">
              <label for="personal-form-name">Name<span class="text-danger">*</span></label>
              <input type="text" id="personal-form-name" class="sm-form-control" ng-model="personal.firstname"/>
            </div>
            <div class="col_half col_last">
              <label for="personal-form-lname">Last Name<span class="text-danger">*</span></label>
              <input type="text" id="personal-form-lname" class="sm-form-control" ng-model="personal.lastname"/>
            </div>
            <div class="clear"></div>
            <div class="col_one_third ">
              <label for="personal-form-nationality">Nationality<span class="text-danger">*</span></label>
              <input type="text" id="personal-form-nationality" class="sm-form-control" ng-model="personal.nationality"/>
            </div>
            <div class="col_one_third">
              <label for="personal-form-dob">Date of birth<span class="text-danger">*</span></label>
              <div class="input-group">
                  <input type="text" class="sm-form-control tleft" placeholder="1986-12-31" ng-model="personal.date_of_birth" id='personal-form-dob'>
                  <span class="input-group-addon" style="padding: 9px 12px;cursor:pointer;">
                  <i class="icon-calendar2"></i>
                </span>
              </div>
            </div>
            <div class="col_one_third col_last">
              <label for="personal-form-gender">Gender<span class="text-danger">*</span></label>
              <select class="selectpicker form-control" id="personal-form-gender"  ng-model="personal.gender">
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            </div>
            <div class="clear"></div>
            <div class="col_two_third">
              <label for="personal-form-email">Email<span class="text-danger">*</span></label>
              <input type="text" id="personal-form-email" class="sm-form-control"  ng-model="personal.email"/>
            </div>
            <div class="col_one_third col_last">
              <label for="personal-form-phone">Phone number<span class="text-danger">*</span></label>
              <input type="text" id="personal-form-phone" class="sm-form-control"  ng-model="personal.phone"/>
            </div>
            <div class="col_one_third ">
              <label for="personal-form-line">LINE ID<span class="text-warning">(Optional)</span></label>
              <input type="text" id="personal-form-line" class="sm-form-control"  ng-model="personal.line"/>
            </div>
            <div class="col_one_third">
              <label for="personal-form-facebook">Facebook<span class="text-warning">(Optional)</span></label>
              <input type="text" id="personal-form-facebook" class="sm-form-control"  ng-model="personal.facebook"/>
            </div>
            <div class="col_one_third col_last">
              <label for="personal-form-skype">Skype<span class="text-warning">(Optional)</span></label>
              <input type="text" id="personal-form-skype" class="sm-form-control" ng-model="personal.skype"/>
            </div>
            <div class="clear"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="fancy-title title-bottom-border">
            <h3 class="">ADDRESS</h3>
          </div>
          <div class="col_full">
            <label for="address-form-address">Address<span class="text-danger">*</span></label>
            <input type="text" id="address-form-address" class="sm-form-control" ng-model="address.street"/>
          </div>
          <div class="col_half ">
            <label for="address-form-city">City<span class="text-danger">*</span></label>
            <input type="text" id="address-form-city" class="sm-form-control" ng-model="address.city"/>
          </div>
          <div class="col_half col_last">
            <label for="address-form-state">State<span class="text-danger">*</span></label>
            <input type="text" id="address-form-state" class="sm-form-control" ng-model="address.state"/>
          </div>
          <div class="clear"></div>
          <div class="col_half">
            <label for="address-form-zipcode">Zipcode<span class="text-danger">*</span></label>
            <input type="text" id="address-form-zipcode" class="sm-form-control" ng-model="address.zipcode"/>
          </div>
          <div class="col_half col_last">
            <label for="address-form-country">Country<span class="text-danger">*</span></label>
            <input type="text" id="address-form-country" class="sm-form-control" ng-model="address.country"/>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear bottommargin"></div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="fancy-title title-bottom-border">
            <h3 class="">PROGRAM DETAILS</h3>
          </div>
          <div class="col_two_fifth">
            <label for="program-form-location">Location<span class="text-danger">*</span></label>
            <select class="selectpicker form-control" id="program-form-location" ng-model="tour.location">
              <option value="1">Namsom, Udonthani</option>
            </select>
          </div>
          <div class="col_two_fifth">
            <label for="program-form-program">Program<span class="text-danger">*</span></label>
            <select class="selectpicker form-control" id="program-form-program" ng-model="tour.project">
              <option value="1">Teaching</option>
            </select>
          </div>
          <div class="col_one_fifth col_last">
            <label for="program-form-start">Start date<span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="text" class="sm-form-control tleft" placeholder="2016-12-31" ng-model="tour.start_date" id='program-form-start'>
                <span class="input-group-addon" style="padding: 9px 12px;cursor:pointer;">
                <i class="icon-calendar2"></i>
              </span>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear bottommargin"></div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="fancy-title title-bottom-border">
            <h3 class="">OTHER DETAIL</h3>
          </div>
          <div class="col_full">
            <label for="other-form-education">Education<span class="text-danger">*</span></label>
            <textarea class="sm-form-control" id="other-form-education" rows="6" cols="30" ng-model="other.education"></textarea>
          </div>
          <div class="col_full">
            <label for="other-form-experiences">Volunteer/Work Experiences<span class="text-danger">*</span></label>
            <textarea class="sm-form-control" id="other-form-experiences" rows="6" cols="30" ng-model="other.experience"></textarea>
          </div>
          <div class="col_full">
            <label for="other-form-language">Language Ability<span class="text-danger">*</span></label>
            <textarea class="sm-form-control" id="other-form-language" rows="6" cols="30" ng-model="other.language"></textarea>
          </div>
          <div class="col_full">
            <label for="other-form-skills">Special Skills<span class="text-danger">*</span></label>
            <textarea class="sm-form-control" id="other-form-skills" rows="6" cols="30" ng-model="other.skill"></textarea>
          </div>
        </div>
        <div class="clear bottommargin"></div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="fancy-title title-bottom-border">
            <h3 class="">EMERGENCY</h3>
          </div>
          <div class="col_full">
            <label for="emergency-form-contact">Contact information<span class="text-danger">*</span></label>
            <textarea class="sm-form-control" id="emergency-form-contact" rows="6" cols="30" ng-model="emergency.contact"></textarea>
          </div>
        </div>
        <div class="clear bottommargin"></div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="fancy-title title-bottom-border">
            <h3 class="">BACKGROUND CHECK</h3>
          </div>
          <div class="text-danger" style="margin-bottom:15px;">
            ALL APPLICANTS MUST ASNWER THE FOLLOWING QUESTION, FAILURE TO ANSWER HONESTLY WILL DISQUALIFY THE APPLICANT FROM SERVICE AS A VOLUNTEER WITH OUR ORGANIZATION.
          </div>
          <div class="col_full">
            <label for="background-form-violation">
              Have you ever been convicted of a crime or pleaded no contested for any offense or violation other than minor traffic violations?
            </label>
            <div>
              <input id="radio-1" class="radio-style" name="radio-group-1" type="radio" ng-model="background.violation" value="yes">
              <label for="radio-1" class="radio-style-2-label">Yes</label>
            </div>
            <div>
              <input id="radio-2" class="radio-style" name="radio-group-1" type="radio"  ng-model="background.violation" value="no">
              <label for="radio-2" class="radio-style-2-label">No</label>
            </div>
            <div ng-show="background.violation=='yes'">
              <label for="background-form-violation-detail">
                Please explain.
              </label>
              <textarea class="sm-form-control" id="background-form-violation-detail" rows="6" cols="30" ng-model="background.violation_detail"></textarea>
            </div>
          </div>

          <div class="col_full">
            <label for="background-form-criminal">
              Do you have any pending criminal charges against you?
            </label>
            <div>
              <input id="radio-3" class="radio-style" name="radio-group-2" type="radio" ng-model="background.criminal" value="yes">
              <label for="radio-3" class="radio-style-2-label">Yes</label>
            </div>
            <div>
              <input id="radio-4" class="radio-style" name="radio-group-2" type="radio" ng-model="background.criminal" value="no">
              <label for="radio-4" class="radio-style-2-label">No</label>
            </div>
            <div ng-show="background.criminal=='yes'">
               <label for="background-form-criminal-detail">
                Please explain.
              </label>
              <textarea class="sm-form-control" id="background-form-criminal-detail" rows="6" cols="30" ng-model="background.criminal_detail"></textarea>
            </div>
          </div>

        </div>
        <div class="clear bottommargin"></div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="fancy-title title-bottom-border">
            <h3 class="">TERMS AND CONDITIONS</h3>
          </div>
          <label> Read Carefully Before Submit This Form</label>
          <div class="col_full well">
            <div style="text-indent: 20px;">
            I hereby certify that I have not knowingly withheld any information that might adversely affect my chances for volunteering or placement as a volunteer and that the answers given by me are true and correct to the best of my knowledge.
            </div>
            <div style="text-indent: 20px;">
            I certify that I, the undersigned applicant, have personally completed this application. I understand that any omission or misstatement of material fact on this application, or on any document used to secure volunteer opportunity, shall be grounds for rejection of this application or for immediate discharge if I am selected and placed as a volunteer regardless of the time elapsed before discovery.
            </div>
            <div style="text-indent: 20px;">
            I understand that no Volunteer or representative of the Agency other than the President of the Agency has any authority to enter into any agreement for employment for any specified period of time, or to make any agreement contrary to the foregoing. Further, the Agency may not alter the at-will nature of the volunteer relationship unless the Agency does so specifically and in writing. I also understand that all offers of volunteer positions are conditioned on the provision of satisfactory proof of an applicant's identity, background check and legal authority to enter Thailand.
            </div>
          </div>
          <div>
            <span class="text-danger">*</span>PLEASE FILL IN ALL OF THE REQUIRED FIELDS
          </div>
          <div>
            <input id="checkbox-12" class="checkbox-style" type="checkbox"  ng-model="agreement">
            <label for="checkbox-12" class="checkbox-style-3-label">Agree to TERMS AND CONDITIONS</label>
          </div>
        </div>
        <div class="clear bottommargin"></div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <center>
            <button class="button button-3d button-large" ng-click="ApplyNow()">
              <i ng-class="(processing)?'icon-cog icon-spin':''"></i> Submit Application
            </button>
          </center>
        </div>
        <div class="clear bottommargin"></div>
      </div>
    </div>
    </form>
  </div>
</section>
<script type="text/javascript">
  $(function() {
    $('#personal-form-dob').datepicker({
      autoclose: true,format: 'yyyy-mm-dd'
    });
    $('#program-form-start').datepicker({
      autoclose: true,format: 'yyyy-mm-dd'
    });
  });
</script>
