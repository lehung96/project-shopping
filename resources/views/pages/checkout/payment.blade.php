<!DOCTYPE html>
<html lang="en">

@include('fronted.head')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
@include('fronted.header')
<!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Thanh Toán giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-accordion">
                                    <!--Accordion Start-->
                                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                                    <div id="checkout-login" class="coupon-content">
                                        <div class="coupon-info">
                                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                            <form action="#">
                                                <p class="form-row-first">
                                                    <label>Username or email <span class="required">*</span></label>
                                                    <input type="text">
                                                </p>
                                                <p class="form-row-last">
                                                    <label>Password  <span class="required">*</span></label>
                                                    <input type="text">
                                                </p>
                                                <p class="form-row">
                                                    <input value="Login" type="submit">
                                                    <label>
                                                        <input type="checkbox">
                                                        Remember me
                                                    </label>
                                                </p>
                                                <p class="lost-password"><a href="#">Lost your password?</a></p>
                                            </form>
                                        </div>
                                    </div>
                                    <!--Accordion End-->
                                    <!--Accordion Start-->
                                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                                    <div id="checkout_coupon" class="coupon-checkout-content">
                                        <div class="coupon-info">
                                            <form action="#">
                                                <p class="checkout-coupon">
                                                    <input placeholder="Coupon code" type="text">
                                                    <input value="Apply Coupon" type="submit">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <!--Accordion End-->
                                </div>
                            </div>
                        </div>
            <div class="row">
                <div class="col-lg-6 col-12">
{{--                      hình thức thanh toán khi người dùng click vào một button--}}
{{--                           sẽ gửi hình thanh toán và gửi shippinh_id, customer_id thêm vào csdl--}}
                    <form method="POST" action="{{URL::to('/order-place')}}">
                        @csrf
                        <div class="checkbox-form">
                            <h4><i style="color: #479bf3" class="fa fa-credit-card"></i> Chọn hình thức thanh toán</h4>
                            <div class="row payment-options">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list " id="paypal-button">
                                        <label>Họ và tên <span class="required">*</span></label>
                                        <label><input name="payment_option" value="1" type="checkbox">Thanh toán online bằng Ví điện tử  <span class="required"><h4><i style="color: #479bf3" class="fa fa-cc-paypal"></i></h4></span> </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label><input name="payment_option" value="2" type="checkbox">Giao hàng và thu tiền tại nhà </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ nhận hàng <span class="required">*</span></label>
                                        <input type="text" name="shipping_address" class="shipping_address" placeholder="Nhập địa chỉ">
                                    </div>
                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="checkout-form-list">
                                                                        <label>Chọn Thành Phố</label>
                                                                        <select class="nice-select select-search-category choose city" name="city" id="city">
                                                                            <option value="">tỉnh thành phố</option>
                                                                            @foreach($city as $key => $ci)
                                                                                <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="checkout-form-list">
                                                                        <label>Chọn quận huyện</label>
                                                                        <select class="nice-select select-search-category province choose" name="province" id="province">
                                                                            <option value="">quận huyện</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="checkout-form-list">
                                                                        <label>Chọ xã phường</label>
                                                                        <select class="nice-select select-search-category wards"  name="wards" id="wards">
                                                                            <option value="">xã phường</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="checkout-form-list">
                                                                        <input name="shipping_address"  placeholder="Số nhà, tên đường,thôn, xóm, khóm, ấp" type="text">
                                                                    </div>
                                                                </div>
                                <div class="col-md-12 order-notes">
                                    <div class="checkout-form-list">
                                        <label>Ghi chú <span class="required">*</span></label>
                                        <textarea id="checkout-mess" name="shipping_notes" cols="30" rows="10" placeholder="để lại lời nhắn cho LIMUPA (nếu có)"></textarea>
                                    </div>
                                </div>
                                <div  class="col-md-6 order-button-payment">
                                    <input style="margin-left: 120px; margin-bottom: 5px; margin-top: 3px"  value="Đặt hàng" type="submit" name="send_order_place">
                                </div>
                                <div class="col-md-12">

                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <h5>
                                        <label>Quý khách có thể chọn hình thức thanh toán, hóa đơn VAT sau khi Gửi đơn hàng</label>

                                    </h5>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h4><i style="color: #479bf3" class="fa fa-shopping-cart"></i> Đơn Hàng </h4>
                        <form action="#" >
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th class="li-product-thumbnail">ảnh</th>
                                        <th class="cart-product-name">sản phẩm</th>
                                        <th class="li-product-price">Gía</th>
                                        <th class="li-product-quantity">Số lượng</th>
                                        <th class="li-product-subtotal">Tổng</th>
                                        <th class="li-product-remove">Lưu</th>
                                        <th class="li-product-remove">Xóa</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(Session::has('cart') != null )
                                        @foreach(Session::get('cart')->items as  $item)
                                            <tr>
                                                <td class="li-product-thumbnail"><a href="#"><img class="product_image_105_100"
                                                                                                  src="{{URL::to('public/uploads/products/'.$item['item']->image)}}"
                                                                                                  alt="cart products"></a></td>
                                                <td class="li-product-name"><a href="#">{{$item['item']->product_name}}</a></td>
                                                <td class="li-product-price"><span
                                                        class="amount">{{ number_format($item['item']->price)}} VNĐ </span></td>
                                                <td class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input data-i="{{$item['item']->product_id}}"  id="quanty-item-{{$item['item']->product_id}}" class="cart-plus-minus-box" value="{{$item['quanty']}}" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{ number_format($item['price'])}} VNĐ </span>
                                                </td>
                                                <td class="li-product-save"><a href="#"><i class="fa fa-save" onclick="SaveListCart({{$item['item']->product_id}});"></i></a>
                                                </td>
                                                <td class="li-product-remove"><a href="#"><i class="fa fa-times" onclick="DeleteListIteamCart({{$item['item']->product_id}});"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        Việc kiểm tra tránh cho giỏ hàng của mình ko tồn tại
                                        @if(Session::has('cart') != null )
                                            <h5>Tổng số giỏ hàng:</h5>
                                            <ul>
                                                <li style="padding-left: 2px " >Tổng số lượng:<span>{{Session::get('cart')->totalQuanty}}</span></li>
                                                <li style="padding-left: 2px ">Tổng Tiền: <span>{{ number_format(Session::get('cart')->totalPrice)}} VNĐ</span></li>
                                                 đổi vnd sang usd
                                                  @php
                                                      $vnd_to_usd= (Session::get('cart')->totalPrice)/23083;
                                                @endphp
                                                <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                                            </ul>
                                                                                        <a href="{{URL::to('/login-checkout')}}">Tiến hành kiểm tra</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input value="Place order" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout Area End-->
@include('fronted.footer')
<!-- Footer Shipping Area End Here -->
</div>
@include('fronted.script')
</body>

</html>

