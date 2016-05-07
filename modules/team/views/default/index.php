<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'Team | '.Yii::$app->params["company_name"].'';
?>
<!-- Page Sub Menu
============================================= -->
<div id="page-menu">

  <div id="page-menu-wrap">

    <div class="container clearfix">

      <div class="menu-title">Team<span> Teachin' Tour</span></div>

      <nav>
        <ul>
          <li><?=Html::a('About', ['/about/'],['data' => ['method' => 'post']]);?></li>
          <li class="current"><?=Html::a('Teams', ['/team/'],['data' => ['method' => 'post']]);?></li>
        </ul>
      </nav>

    <div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

    </div>

  </div>

</div><!-- #page-menu end -->
<!-- Content
============================================= -->
<section id="content">

  <div class="content-wrap">

    <div class="container clearfix">
          <div class="row">

            <div class="col-md-6 bottommargin">

              <div class="team team-list clearfix">
                <div class="team-image">
                  <img src="images/team/teamPumpoui.png" alt="John Doe">
                </div>
                <div class="team-desc">
                  <div class="team-title"><h4>Pumpoui Chankul</h4><span>Co-founder</span></div>
                  <div class="team-content">
                    <p>"Pumpoui, a young talented girl from Chicago, is trying to find a way to help local students be able to speak English. English has always been her favorite language. And she would like other to like it as she does. She invited Eric to join her adventure and start a "teachin' tour" company."</p>
                  </div>
                  <a href="#" class="social-icon si-rounded si-small si-facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                  </a>
                  <a href="#" class="social-icon si-rounded si-small si-twitter">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                  </a>
                  <a href="#" class="social-icon si-rounded si-small si-gplus">
                    <i class="icon-gplus"></i>
                    <i class="icon-gplus"></i>
                  </a>
                </div>
              </div>

            </div>

            <div class="col-md-6 bottommargin">

              <div class="team team-list clearfix">
                <div class="team-image">
                  <img src="images/team/teamEric.png" alt="Nix Maxwell">
                </div>
                <div class="team-desc">
                  <div class="team-title"><h4>Eric Prom</h4><span>Co-founder</span></div>
                  <div class="team-content">
                    <p>"From someone that used to hate English, turn to love English all of his heart. After came back from the USA, Eric noticed that the language barrier that placed between Thai people and English speaker is so thick. He and his co-founder start a company called "teachin' tour" to help breaking it down."</p>
                  </div>
                  <a href="#" class="social-icon si-rounded si-small si-forrst">
                    <i class="icon-forrst"></i>
                    <i class="icon-forrst"></i>
                  </a>
                  <a href="#" class="social-icon si-rounded si-small si-skype">
                    <i class="icon-skype"></i>
                    <i class="icon-skype"></i>
                  </a>
                  <a href="#" class="social-icon si-rounded si-small si-flickr">
                    <i class="icon-flickr"></i>
                    <i class="icon-flickr"></i>
                  </a>
                </div>
              </div>

            </div>

          </div>

          <div class="clear"></div>
    </div>

  </div>

</section><!-- #content end -->
