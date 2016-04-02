<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->title = 'booking';
?>
<section class="parallax-window" data-parallax="scroll" data-image-src="http://lorempixel.com/1400/470/" data-natural-width="1400" data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown">
        <h1>Place your order</h1>
            <div class="bs-wizard">

                <div class="col-xs-4 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Booking</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <?=Html::a('',['/booking/'],['class'=>'bs-wizard-dot']);?>
                </div>

                <div class="col-xs-4 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">Payment</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <?=Html::a('',['/payment/'],['class'=>'bs-wizard-dot']);?>
                </div>

              <div class="col-xs-4 bs-wizard-step disabled">
                  <div class="text-center bs-wizard-stepnum">Finish!</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <?=Html::a('',['/confirmation/'],['class'=>'bs-wizard-dot']);?>
                </div>

    </div>  <!-- End bs-wizard -->
        </div>
    </div>
</section><!-- End Section -->
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
    <div class="col-md-8">
      <table class="table table-striped cart-list add_bottom_30">
            <thead>
            <tr>
                <th>
                    Item
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Discount
                </th>
                <th>
                    Total
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="img/thumb_cart_1.jpg" alt="">
                    </div>
                     <span class="item_cart">Louvre Museum tickets</span>
                </td>
                <td>
                    <div class="numbers-row">
                        <input type="text" value="1" id="quantity_1" class="qty2 form-control" name="quantity_1">
                    </div>
                </td>
                <td>
                    0%
                </td>
                <td>
                    <strong>€24,71</strong>
                </td>
                <td class="options">
                    <a href="#"><i class=" icon-trash"></i></a><a href="#"><i class="icon-ccw-2"></i></a>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="img/thumb_cart_1.jpg" alt="">
                    </div>
                    <span class="item_cart">Eiffell tour</span>
                </td>
                <td>
                    <div class="numbers-row">
                        <input type="text" value="0" id="quantity_2" class="qty2 form-control" name="quantity_2">
                    </div>
                </td>
                <td>
                    0%
                </td>
                <td>
                    <strong>€0,0</strong>
                </td>
                <td class="options">
                    <a href="#"><i class=" icon-trash"></i></a><a href="#"><i class="icon-ccw-2"></i></a>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="thumb_cart">
                        <img src="img/thumb_cart_1.jpg" alt="">
                    </div>
                     <span class="item_cart">Senna river Tour</span>
                </td>
                <td>
                    <div class="numbers-row">
                        <input type="text" value="1" id="quantity_3" class="qty2 form-control" name="quantity_3">
                    </div>
                </td>
                <td>
                    0%
                </td>
                <td>
                    <strong>€24,71</strong>
                </td>
                <td class="options">
                    <a href="#"><i class=" icon-trash"></i></a><a href="#"><i class="icon-ccw-2"></i></a>
                </td>
            </tr>
            </tbody>
            </table>
            <table class="table table-striped options_cart">
            <thead>
            <tr>
                <th colspan="3">
                    Add options / Services
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width:10%">
                    <i class="icon_set_1_icon-16"></i>
                </td>
                <td style="width:60%">
                    Dedicated Tour guide <strong>+$34</strong>
                </td>
                <td style="width:35%">
                    <label class="switch-light switch-ios pull-right">
                    <input type="checkbox" name="option_1" id="option_1" checked value="">
                    <span>
                    <span>No</span>
                    <span>Yes</span>
                    </span>
                    <a></a>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="icon_set_1_icon-26"></i>
                </td>
                <td>
                    Pick up service <strong>+$34*</strong>
                </td>
                <td>
                    <label class="switch-light switch-ios pull-right">
                    <input type="checkbox" name="option_2" id="option_2" value="">
                    <span>
                    <span>No</span>
                    <span>Yes</span>
                    </span>
                    <a></a>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="icon_set_1_icon-71"></i>
                </td>
                <td>
                    Insurance <strong>+$24*</strong>
                </td>
                <td>
                    <label class="switch-light switch-ios pull-right">
                    <input type="checkbox" name="option_3" id="option_3" value="" checked>
                    <span>
                    <span>No</span>
                    <span>Yes</span>
                    </span>
                    <a></a>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="icon_set_1_icon-15"></i>
                </td>
                <td>
                    Welcome bottle <strong>+$24</strong>
                </td>
                <td>
                    <label class="switch-light switch-ios pull-right">
                    <input type="checkbox" name="option_4" id="option_4" value="">
                    <span>
                    <span>No</span>
                    <span>Yes</span>
                    </span>
                    <a></a>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="icon_set_1_icon-59"></i>
                </td>
                <td>
                    Coffe break <strong>+$12*</strong>
                </td>
                <td>
                    <label class="switch-light switch-ios pull-right">
                    <input type="checkbox" name="option_5" id="option_5" value="">
                    <span>
                    <span>No</span>
                    <span>Yes</span>
                    </span>
                    <a></a>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="icon_set_1_icon-58"></i>
                </td>
                <td>
                    Dinner <strong>+$26*</strong>
                </td>
                <td>
                    <label class="switch-light switch-ios pull-right">
                    <input type="checkbox" name="option_6" id="option_6" value="">
                    <span>
                    <span>No</span>
                    <span>Yes</span>
                    </span>
                    <a></a>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <i class="icon_set_1_icon-40"></i>
                </td>
                <td>
                    Bike rent <strong>+$26*</strong>
                </td>
                <td>
                    <label class="switch-light switch-ios pull-right">
                    <input type="checkbox" name="option_7" id="option_7" value="">
                    <span>
                    <span>No</span>
                    <span>Yes</span>
                    </span>
                    <a></a>
                    </label>
                </td>
            </tr>
            </tbody>
            </table>
            <div class="add_bottom_15"><small>* Prices for person.</small></div>
    </div><!-- End col-md-8 -->

    <aside class="col-md-4">
    <div class="box_style_1">
        <h3 class="inner">- Summary -</h3>
        <table class="table table_summary">
        <tbody>
        <tr>
            <td>
                Adults
            </td>
            <td class="text-right">
                2
            </td>
        </tr>
        <tr>
            <td>
                Children
            </td>
            <td class="text-right">
                0
            </td>
        </tr>
        <tr>
            <td>
                Dedicated tour guide
            </td>
            <td class="text-right">
                $34
            </td>
        </tr>
        <tr>
            <td>
                Insurance
            </td>
            <td class="text-right">
                $34
            </td>
        </tr>
        <tr class="total">
            <td>
                Total cost
            </td>
            <td class="text-right">
                $154
            </td>
        </tr>
        </tbody>
        </table>
        <?=Html::a('Check out', ['/payment/'],['data' => ['method' => 'post'],'class'=>'btn_full']);?>
    </div>
    <div class="box_style_4">
        <i class="icon_set_1_icon-57"></i>
        <h4>Need <span>Help?</span></h4>
        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
        <small>Monday to Friday 9.00am - 7.30pm</small>
    </div>
    </aside><!-- End aside -->

</div><!--End row -->
</div><!--End container -->
