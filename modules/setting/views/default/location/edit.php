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
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Update Location</h3>
      </div>
      <div class="col_full nobottommargin">
        <p>Need to add more detail? Update a location to make it better.</p>
          <div class="tabs tabs-bb clearfix" id="tab-9">

            <ul class="tab-nav clearfix">
              <li><a href="#location-detail">Location Detail</a></li>
              <li><a href="#location-glance">At a glance</a></li>
              <li><a href="#location-gallery">Location Gallery</a></li>
            </ul>

            <div class="tab-container">
              <div class="tab-content clearfix" id="location-detail">
                <div class="col_full">
                  <label for="register-form-name">Location Name:</label>
                  <input type="text" class="form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_full">
                  <label for="register-form-username">Location Description:</label>
                  <textarea class="form-control" rows="6"></textarea>
                </div>
                <div class="clear"></div>

                <div class="col_full nobottommargin">
                  <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Update Now</button>
                </div>
              </div>
              <div class="tab-content clearfix" id="location-glance">
                <div>
                  <input id="checkbox-10" class="checkbox-style" name="checkbox-10" type="checkbox" checked>
                  <label for="checkbox-10" class="checkbox-style-3-label">Available year-round</label>
                </div>
                <div>
                  <input id="checkbox-11" class="checkbox-style" name="checkbox-11" type="checkbox">
                  <label for="checkbox-11" class="checkbox-style-3-label">Homestay</label>
                </div>
                <div>
                  <input id="checkbox-12" class="checkbox-style" name="checkbox-12" type="checkbox">
                  <label for="checkbox-12" class="checkbox-style-3-label">Airport pick-up</label>
                </div>
              </div>
              <div class="tab-content clearfix" id="location-gallery">
                <section>
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      The recommended size for the image is [800x533] and in [.jpg,.png,.gif] format.
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <button class="btn btn-default pull-right"
                        ng-click="cancelUpload()">
                        X
                      </button>
                    </div>
                  </div>
                  <hr>
                  <form id="my-cover-dropzone" action="<?=Yii::$app->request->baseUrl; ?>/api/v1/file/upload" class="dropzone" name="{{programID}}" tag="covers">
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
<script>
$(document).ready(function() {
    Dropzone.options.myGalleryDropzone = {
        acceptedFiles: "image/jpeg,image/png,image/gif",
        init: function() {
            this.on("processing", function(file) {
                this.options.url = document.getElementById("my-gallery-dropzone").getAttribute("action")+"?tag=gallerys&folder="+document.getElementById("my-gallery-dropzone").name;
            });
        }
    };
});
</script>
