<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Preview Project | '.Yii::$app->params["company_name"].'';
?>
<div ng-controller="SettingApplicationDetailController" ng-cloak>
  <section id="page-title" ng-show="hasItem && !isLoading">
    <div class="container clearfix">
      <h1 ng-show="approval.date==null">REVIEW: Application</h1>
      <h1 ng-show="approval.date!=null && approval.status=='true'">ACCEPTED: Application</h1>
      <h1 ng-show="approval.date!=null && approval.status=='false'">REJECTED: Application</h1>
    </div>
  </section>
  <section id="content">
    <div class="content-wrap" ng-show="!hasItem && !isLoading">
      <div class="container clearfix">
        <div class="col_full">
          <div class="error404 center">404</div>
        </div>
      </div>
    </div>
    <div class="content-wrap" ng-show="hasItem && !isLoading">
      <div class="container clearfix">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">PERSONAL DETAILS</h3>
            </div>
              <div class="col_full">
                <strong>Name:</strong> {{(personal.firstname+" "+personal.lastname)}}
              </div>
              <div class="col_one_third ">
                <strong>Nationality:</strong>{{personal.nationality}}
              </div>
              <div class="col_one_third">
                <strong>Date of birth:</strong> {{personal.date_of_birth}}
              </div>
              <div class="col_one_third col_last">
                <strong>Gender:</strong>
                <span ng-show="personal.gender==1">Male</span>
                <span ng-show="personal.gender==0">Female</span>
              </div>
              <div class="col_half">
                <strong>Email:</strong> {{personal.email}}
              </div>
              <div class="col_half col_last">
                <strong>Phone number:</strong> {{personal.phone}}
              </div>
              <div class="col_one_third">
                <span ng-show="personal.line!=null"><strong>LINE ID:</strong> {{personal.line}}</span>
              </div>
              <div class="col_one_third">
                <span ng-show="personal.facebook!=null"><strong>Facebook:</strong> {{personal.facebook}}</span>
              </div>
              <div class="col_one_third col_last">
                <span ng-show="personal.skype!=null"><strong>Skype:</strong> {{personal.skype}}</span>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">ADDRESS</h3>
            </div>
            <div class="col_full">
                <strong>Address:</strong> {{address.street}}
            </div>
            <div class="col_half ">
                <strong>City:</strong> {{address.city}}
            </div>
            <div class="col_half col_last">
                <strong>State:</strong> {{address.state}}
            </div>
            <div class="clear"></div>
            <div class="col_half">
                <strong>Zipcode:</strong> {{address.zipcode}}
            </div>
            <div class="col_half col_last">
                <strong>Country:</strong> {{address.country}}
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">PROGRAM DETAILS</h3>
            </div>
            <div class="col_two_fifth">
                <strong>Location:</strong> {{tour.location.title}}
            </div>
            <div class="col_two_fifth">
                <strong>Project:</strong> {{tour.project.title}}
            </div>
            <div class="col_one_fifth col_last">
                <strong>Start Date:</strong> {{tour.start_date}}
            </div>
            <div class="clear"></div>
            <div class="col_one_fifth col_last">
                <strong>Fee:</strong> {{(tour.fee.title+" ($"+tour.fee.price+")")}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">OTHER DETAIL</h3>
            </div>
            <div class="col_full">
                <strong>Education:</strong> {{other.education}}
            </div>
            <div class="col_full">
                <strong>Volunteer/Work Experiences:</strong> {{other.experience}}
            </div>
            <div class="col_full">
                <strong>Language Ability:</strong> {{other.language}}
            </div>
            <div class="col_full">
                <strong>Special Skills:</strong> {{other.skill}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">EMERGENCY</h3>
            </div>
            <div class="col_full">
                <strong>Contact information:</strong> {{emergency.contact}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">BACKGROUND CHECK</h3>
            </div>
            <div class="col_full">
                <strong>Crime or violation:</strong> {{background.violation}}
                <p ng-show="background.violation=='yes'">
                <strong>Detail:</strong>
                  {{background.violation_detail}}
                </p>
            </div>
            <div class="col_full">
                <strong>Pending criminal:</strong> {{background.criminal}}
                <p ng-show="background.criminal=='yes'">
                 <strong>Detail:</strong>
                 {{background.criminal_detail}}
                </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="fancy-title title-bottom-border">
              <h3 class="">STAFF RESPONSE</h3>
            </div>
            <div class="col_full">
              <label for="other-form-education">Note:</label>
              <textarea class="sm-form-control" id="other-form-education" rows="6" cols="30" ng-model="approval.note"></textarea>
            </div>
            <div class="col_full">
              <label for="approval-form-qualification">
                Is this applicant pass the qualification?
              </label>
              <div>
                <input id="radio-3" class="radio-style" name="radio-group-2" type="radio" ng-model="approval.status" value="true">
                <label for="radio-3" class="radio-style-2-label">Yes</label>
                <input id="radio-4" class="radio-style" name="radio-group-2" type="radio" ng-model="approval.status" value="false">
                <label for="radio-4" class="radio-style-2-label">No</label>
              </div>
            </div>
            <center>
            <button class="button button-3d button-large" ng-click="ResponseBack()">
              <i ng-class="(processing)?'icon-cog icon-spin':''"></i> Submit Response
            </button>
          </center>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
