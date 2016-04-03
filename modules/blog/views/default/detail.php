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
        <div class="post nopadding">
        <img src="http://lorempixel.com/950/375/" alt="" class="img-responsive">
          <div class="post_info clearfix">
            <div class="post-left">
              <ul>
                <li><i class="icon-calendar-empty"></i>On <span>12 Nov 2020</span></li>
                                <li><i class="icon-inbox-alt"></i>In <a href="#">Top tours</a></li>
                <li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a></li>
              </ul>
            </div>
            <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>Comments</div>
          </div>
          <h2>Duis aute irure dolor in reprehenderit</h2>
          <p>
            Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem.....
          </p>
                    <p>
                      Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
          </p>
                     <blockquote class="styled">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                            <small>Someone famous in <cite title="">Body of work</cite></small>
                          </blockquote>
        </div><!-- end post -->
                </div><!-- end box_style_1 -->

                <h4>3 comments</h4>

        <div id="comments">
          <ol>
            <li>
            <div class="avatar"><a href="#"><img src="<?=Yii::$app->request->baseUrl; ?>/img/staffs/eric.jpg" alt=""></a></div>
            <div class="comment_right clearfix">
              <div class="comment_info">
                Posted by <a href="#">Anna Smith</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
              </div>
              <p>
                 Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
              </p>
            </div>
            <ul>
              <li>
              <div class="avatar"><a href="#"><img src="<?=Yii::$app->request->baseUrl; ?>/img/staffs/eric.jpg" alt=""></a></div>

              <div class="comment_right clearfix">
                <div class="comment_info">
                  Posted by <a href="#">Tom Sawyer</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
                </div>
                <p>
                   Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                </p>
                <p>
                   Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                </p>
              </div>
              </li>
            </ul>
            </li>
            <li>
            <div class="avatar"><a href="#"><img src="<?=Yii::$app->request->baseUrl; ?>/img/staffs/eric.jpg" alt=""></a></div>

            <div class="comment_right clearfix">
              <div class="comment_info">
                Posted by <a href="#">Adam White</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
              </div>
              <p>
                Cursus tellus quis magna porta adipiscin
              </p>
            </div>
            </li>
          </ol>
        </div><!-- End Comments -->

        <h4>Leave a comment</h4>
        <form action="#" method="post">
          <div class="form-group">
            <input class="form-control style_2" type="text" name="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <input class="form-control style_2" type="text" name="mail" placeholder="Enter email">
          </div>
          <div class="form-group">
            <textarea name="message" class="form-control style_2" style="height:150px;" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="reset" class="btn_1" value="Clear form"/>
            <input type="submit" class="btn_1" value="Post Comment"/>
          </div>
        </form>
     </div><!-- End col-md-8-->

     <aside class="col-md-3 add_bottom_30">

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
