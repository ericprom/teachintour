<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Edit Project | '.Yii::$app->params["company_name"].'';
?>
<div id="page-menu">
  <div id="page-menu-wrap">
    <div class="container clearfix">
      <div class="menu-title">Edit <span>Project</span></div>
    </div>
  </div>
</div>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="fancy-title title-border">
        <h3>Edit Project</h3>
      </div>
      <div class="col_full nobottommargin">
        <p>Need to add more detail? Update a project to make it better.</p>
         <!--  <div class="col_full">
            <label for="register-form-name">Project Name:</label>
            <input type="text" class="form-control" />
          </div>

          <div class="clear"></div>

          <div class="col_full">
            <label for="register-form-username">Project Description:</label>
            <textarea class="form-control" rows="6"></textarea>
          </div>
          <div class="clear"></div>

          <div class="col_full nobottommargin">
            <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Save Now</button>
          </div> -->
          <div class="tabs tabs-bb clearfix" id="tab-9">

            <ul class="tab-nav clearfix">
              <li><a href="#project-detail">Project Detail</a></li>
              <li><a href="#project-cover">Project Cover</a></li>
            </ul>

            <div class="tab-container">
              <div class="tab-content clearfix" id="project-detail">
                <div class="col_full">
                  <label for="register-form-name">Project Name:</label>
                  <input type="text" class="form-control" />
                </div>

                <div class="clear"></div>

                <div class="col_full">
                  <label for="register-form-username">Project Description:</label>
                  <textarea class="form-control" rows="6"></textarea>
                </div>
                <div class="clear"></div>

                <div class="col_full nobottommargin">
                  <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Update Now</button>
                </div>
              </div>
              <div class="tab-content clearfix" id="project-cover">
                <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.
              </div>
            </div>

          </div>
      </div>
    </div>
  </div>
</div>
