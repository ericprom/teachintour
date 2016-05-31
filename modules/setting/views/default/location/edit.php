<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Update Location | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Update <span>Location</span></div>
    </div>
  </div>
</div>
<section id="content" ng-controller="SettingLocationEditController" ng-cloak>
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Update location</h3>
      </div>
      <div class="col_full nobottommargin">
         <p>Need to add more detail? Update a location to make it better.</p>
          <div class="tabs tabs-bb clearfix" id="tab-9">

            <ul class="tab-nav clearfix">
              <li><a href="#location-detail">Location Detail</a></li>
              <li><a href="#location-cover">Location Cover</a></li>
            </ul>

            <div class="tab-container">
              <div class="tab-content clearfix" id="location-detail">
                <div class="col_two_third">
                  <div class="col_full">
                    <label for="register-form-name">Location Name:</label>
                    <input type="text" class="form-control" ng-model="Location.title"/>
                  </div>

                  <div class="clear"></div>

                  <div class="col_full">
                    <label for="register-form-username">Location Description:</label>
                    <textarea class="form-control" rows="6"  ng-model="Location.detail">{{Location.detail}}</textarea>
                  </div>
                  <div class="clear"></div>
                </div>
                <div class="col_one_third col_last">
                  <label for="register-form-name">Control:</label>
                  <div class="well well-lg">
                    <div>
                      <input id="checkbox-12" class="checkbox-style" type="checkbox"  ng-model="Location.available">
                      <label for="checkbox-12" class="checkbox-style-3-label">Available</label>
                    </div>
                  </div>
                </div>
                <div class="col_full nobottommargin">
                  <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register" ng-click="updateNewLocation()">Update Now</button>
                  <button class="button button-3d button-red nomargin pull-right" id="register-form-submit" name="register-form-submit" value="register" ng-click="deleteNewLocation()">Delete Now</button>
                </div>
              </div>
              <div class="tab-content clearfix" id="location-cover">
                <section ng-show="Cover.list.length>=1 && !Cover.addMore">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      Pick one of the images below as a location cover.
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <button class="btn btn-default pull-right"
                        ng-click="addCover()">
                        <i class="icon-plus"></i>
                      </button>
                    </div>
                  </div>
                  <dev class="row">
                    <div class="col-md-4 col-sm-4 portfolio" ng-repeat="cover in Cover.list">
                      <div class="thumbnail">
                        <img src="{{cover.image_path[1]}}" style="display: block;">
                        <div class="caption">
                          <a href="#" class="btn " ng-class="(cover.covered)?'btn-primary':'btn-default'" role="button" ng-click="markAsCover(cover)">
                            <i class="icon-picture"></i>
                          </a>
                          <a href="#" class="btn btn-default pull-right" role="button" ng-click="deleteCover(cover)">
                            <i class="icon-trash"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </dev>
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
                  <form id="my-cover-dropzone" action="<?=Yii::$app->request->baseUrl; ?>/api/v1/file/upload" class="dropzone" name="{{locationID}}">
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
                this.options.url = document.getElementById("my-cover-dropzone").getAttribute("action")+"?folder=locations&section=covers&location="+document.getElementById("my-cover-dropzone").name;
            });
        }
    };
});
</script>

