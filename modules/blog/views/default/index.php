<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'location';
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="http://lorempixel.com/1400/470/" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
            <h1>Tour Blog</h1>
            <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p></div>
            </div>
    </section><!-- End section -->

  <div id="position">
      <div class="container">
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li>Page active</li>
                    </ul>
        </div>
    </div><!-- End position -->

<div class="container margin_60">
    <div class="row">

     <div class="col-md-9">
         <div class="box_style_1">
        <div class="post">
          <a href="<?=Yii::$app->request->baseUrl; ?>/blog/1" ><img src="http://lorempixel.com/950/375/" alt="" class="img-responsive"></a>
          <div class="post_info clearfix">
            <div class="post-left">
              <ul>
                <li><i class="icon-calendar-empty"></i> On <span>12 Nov 2020</span></li>
                                <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a></li>
                <li><i class="icon-tags"></i> Tags <a href="#">Works</a>, <a href="#">Personal</a></li>
              </ul>
            </div>
            <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a></div>
          </div>
          <h2>Duis aute irure dolor in reprehenderit</h2>
          <p>
            Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
          </p>
                    <p>
            Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
          </p>
          <a href="<?=Yii::$app->request->baseUrl; ?>/blog/1" class="btn_1" >Read more</a>
        </div><!-- end post -->

                <hr>

        <div class="post">
          <a href="<?=Yii::$app->request->baseUrl; ?>/blog/2" ><img src="http://lorempixel.com/950/375/" alt="" class="img-responsive"></a>
          <div class="post_info clearfix">
            <div class="post-left">
              <ul>
                <li><i class="icon-calendar-empty"></i> On <span>12 Nov 2020</span></li>
                                <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a></li>
                <li><i class="icon-tags"></i> Tags <a href="#">Works</a>, <a href="#">Personal</a></li>
              </ul>
            </div>
            <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>Comments</div>
          </div>
          <h2>Duis aute irure dolor in reprehenderit</h2>
          <p>
            Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.....
          </p>
          <a href="<?=Yii::$app->request->baseUrl; ?>/blog/2" class=" btn_1">Read more</a>
        </div><!-- end post -->

                <hr>

        <div class="post">
          <a href="<?=Yii::$app->request->baseUrl; ?>/blog/3" ><img src="http://lorempixel.com/950/375/" alt="" class="img-responsive"></a>
          <div class="post_info clearfix">
            <div class="post-left">
              <ul>
                <li><i class="icon-calendar-empty"></i> On <span>12 Nov 2020</span></li>
                                <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a></li>
                <li><i class="icon-tags"></i> Tags <a href="#">Works</a>, <a href="#">Personal</a></li>
              </ul>
            </div>
            <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>Comments</div>
          </div>
          <h2>Duis aute irure dolor in reprehenderit</h2>
          <p>
            Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.....
          </p>
                    <p>
            Ludus albucius adversarium eam eu. Sit eu reque tation aliquip. Quo no dolorum albucius lucilius, hinc eligendi ut sed. Ex nam quot ferri suscipit, mea ne legere alterum repudiandae. Ei pri quaerendum intellegebat, ut vel consequuntur voluptatibus. Et volumus sententiae adversarium duo......
          </p>
          <a href="<?=Yii::$app->request->baseUrl; ?>/blog/3" class="btn_1" >Read more</a>
        </div><!-- end post -->
                </div>
        <hr>

                <div class="text-center">
                    <ul class="pagination">
                        <li><a href="#">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul><!-- end pagination-->
                </div>
     </div><!-- End col-md-8-->

      <aside class="col-md-3">

        <div class="widget">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
            </span>
          </div><!-- /input-group -->
        </div><!-- End Search -->
                <hr>
        <div class="widget" id="cat_blog">
          <h4>Categories</h4>
          <ul>
                      <li><a href="#">Places to visit</a></li>
                        <li><a href="#">Top tours</a></li>
                        <li><a href="#">Tips for travellers</a></li>
                        <li><a href="#">Events</a></li>
                    </ul>
        </div><!-- End widget -->

               <hr>

        <div class="widget">
          <h4>Recent post</h4>
          <ul class="recent_post">
            <li>
            <i class="icon-calendar-empty"></i> 16th July, 2020
            <div><a href="#">It is a long established fact that a reader will be distracted </a></div>
            </li>
            <li>
            <i class="icon-calendar-empty"></i> 16th July, 2020
            <div><a href="#">It is a long established fact that a reader will be distracted </a></div>
            </li>
            <li>
            <i class="icon-calendar-empty"></i> 16th July, 2020
            <div><a href="#">It is a long established fact that a reader will be distracted </a></div>
            </li>
          </ul>
        </div><!-- End widget -->
                <hr>
        <div class="widget tags">
          <h4>Tags</h4>
          <a href="#">Lorem ipsum</a>
          <a href="#">Dolor</a>
          <a href="#">Long established</a>
          <a href="#">Sit amet</a>
          <a href="#">Latin words</a>
          <a href="#">Excepteur sint</a>
        </div><!-- End widget -->

     </aside><!-- End aside -->

  </div><!-- End row-->
</div><!-- End container -->
