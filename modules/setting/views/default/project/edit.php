<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Update Project | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Update <span>Project</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingProjectEditController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Update Project</h3>
      </div>
      <div class="col_full nobottommargin">
        <p>Need to add more detail? Update a project to make it better.</p>
          <div class="tabs tabs-bb clearfix" id="tab-9">

            <ul class="tab-nav clearfix">
              <li><a href="#project-detail">Project Detail</a></li>
              <li><a href="#project-cover">Project Cover</a></li>
            </ul>

            <div class="tab-container">
              <div class="tab-content clearfix" id="project-detail">
                <div class="col_two_third">
                  <div class="col_full">
                    <label for="register-form-name">Project Name:</label>
                    <input type="text" class="form-control" ng-model="Project.title"/>
                  </div>

                  <div class="clear"></div>

                  <div class="col_full">
                    <label for="register-form-username">Project Description:</label>
                    <textarea class="form-control" rows="6"  ng-model="Project.detail">{{Project.detail}}</textarea>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col_one_third col_last">
                  <label for="register-form-name">Control:</label>
                  <div class="well well-lg">
                    <div>
                      <input id="checkbox-12" class="checkbox-style" type="checkbox"  ng-model="Project.available">
                      <label for="checkbox-12" class="checkbox-style-3-label">Available</label>
                    </div>
                  </div>
                </div>
                <div class="col_full nobottommargin">
                  <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register" ng-click="updateNewProject()">Update Now</button>
                  <button class="button button-3d button-red nomargin pull-right" id="register-form-submit" name="register-form-submit" value="register" ng-click="deleteNewProject()">Delete Now</button>
                </div>
              </div>
              <div class="tab-content clearfix" id="project-cover">
                <section class="row" ng-show="Cover.list.length>=1 && !Cover.addMore">
                  <div class="col-md-4 col-sm-4" ng-repeat="cover in Cover.list">
                    <div class="tour_container">
                      <div class="img_container">
                          <img src="{{cover.image_path[1]}}" class="img-responsive" alt="">
                          <div class="ribbon top_covered" ng-show="cover.covered"></div>
                      </div>
                      <div class="tour_title">
                       <button class="btn btn-default" ng-click="markAsCover(cover)">
                          <i class="icon-picture"></i>
                        </button>
                       <button class="btn btn-default pull-right" ng-click="deleteCover(cover)">
                          <i class="icon-trash"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <div class="tour_container" ng-click="addCover()" style="cursor: pointer;">
                      <div class="img_container">
                          <img src="<?=Yii::$app->request->baseUrl; ?>/images/default/add.jpg" class="img-responsive" alt="">
                      </div>
                      <div class="tour_title">
                        <h3 style="padding: 7px;text-align: center;">Add more cover</h3>
                      </div>
                    </div>
                  </div>
                </section>
                <section ng-show="Cover.list.length<=0 || Cover.addMore">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      The recommended size for the cover is [800x533] and in [.jpg,.png,.gif] format.
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <button class="btn btn-default pull-right"
                        ng-click="cancelUpload()">
                        X
                      </button>
                    </div>
                  </div>
                  <hr>
                  <form id="my-cover-dropzone" action="<?=Yii::$app->request->baseUrl; ?>/api/v1/file/upload" class="dropzone" name="{{projectID}}">
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                  </form>
                </section>
              </div>
            </div>

          </div>
      </div>
    </div>
  </div>
</div>

<script src="<?=Yii::$app->request->baseUrl; ?>/js/jquery.js"></script>
<script>
$(document).ready(function() {
    Dropzone.options.myCoverDropzone = {
        acceptedFiles: "image/jpeg,image/png,image/gif",
        init: function() {
            this.on("processing", function(file) {
                this.options.url = document.getElementById("my-cover-dropzone").getAttribute("action")+"?folder=projects&section=covers&location="+document.getElementById("my-cover-dropzone").name;
            });
        }
    };
});
</script>
