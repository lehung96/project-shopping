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
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="coupon-accordion">--}}
{{--                        <!--Accordion Start-->--}}
{{--                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>--}}
{{--                        <div id="checkout-login" class="coupon-content">--}}
{{--                            <div class="coupon-info">--}}
{{--                                <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>--}}
{{--                                <form action="#">--}}
{{--                                    <p class="form-row-first">--}}
{{--                                        <label>Username or email <span class="required">*</span></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </p>--}}
{{--                                    <p class="form-row-last">--}}
{{--                                        <label>Password  <span class="required">*</span></label>--}}
{{--                                        <input type="text">--}}
{{--                                    </p>--}}
{{--                                    <p class="form-row">--}}
{{--                                        <input value="Login" type="submit">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox">--}}
{{--                                            Remember me--}}
{{--                                        </label>--}}
{{--                                    </p>--}}
{{--                                    <p class="lost-password"><a href="#">Lost your password?</a></p>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--Accordion End-->--}}
{{--                        <!--Accordion Start-->--}}
{{--                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>--}}
{{--                        <div id="checkout_coupon" class="coupon-checkout-content">--}}
{{--                            <div class="coupon-info">--}}
{{--                                <form action="#">--}}
{{--                                    <p class="checkout-coupon">--}}
{{--                                        <input placeholder="Coupon code" type="text">--}}
{{--                                        <input value="Apply Coupon" type="submit">--}}
{{--                                    </p>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--Accordion End-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-lg-6 col-12">
{{--                    <form action="{{URL::to('/save-checkout-customer')}}" method="post">--}}
                    <form method="POST">
                        @csrf
                        <div class="checkbox-form">
                            <h4><i style="color: #479bf3" class="fa fa-map-marker"></i> Th??ng tin mua h??ng </h4>
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>H??? v?? t??n <span class="required">*</span></label>
                                        <input type="text" name="shipping_name" class="shipping_name" placeholder="H??? v?? t??n">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>??i???n tho???i <span class="required">*</span></label>
                                        <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Nh???p s??? ??i???n tho???i">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>?????a ch??? nh???n h??ng <span class="required">*</span></label>
                                        <input type="text" name="shipping_address" class="shipping_address" placeholder="Nh???p ?????a ch???">
                                    </div>
                                </div>

{{--                                <div class="col-md-4">--}}
{{--                                    <div class="checkout-form-list">--}}
{{--                                        <label>Ch???n Th??nh Ph???</label>--}}
{{--                                        <select class="nice-select select-search-category choose city" name="city" id="city">--}}
{{--                                            <option value="">t???nh th??nh ph???</option>--}}
{{--                                            @foreach($city as $key => $ci)--}}
{{--                                                <option value="{{$ci->matp}}">{{$ci->name_city}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="checkout-form-list">--}}
{{--                                        <label>Ch???n qu???n huy???n</label>--}}
{{--                                        <select class="nice-select select-search-category province choose" name="province" id="province">--}}
{{--                                            <option value="">qu???n huy???n</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="checkout-form-list">--}}
{{--                                        <label>Ch??? x?? ph?????ng</label>--}}
{{--                                        <select class="nice-select select-search-category wards"  name="wards" id="wards">--}}
{{--                                            <option value="">x?? ph?????ng</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="checkout-form-list">--}}
{{--                                        <input name="shipping_address"  placeholder="S??? nh??, t??n ???????ng,th??n, x??m, kh??m, ???p" type="text">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12 order-notes">
                                    <div class="checkout-form-list">
                                        <label>Ghi ch?? g???i h??ng<span class="required">*</span></label>
                                        <textarea id="checkout-mess" name="shipping_notes" class="shipping_notes" cols="30" rows="10" placeholder="Ghi ch?? v??? ????n ?????t h??ng c???a b???n, v?? d???: l??u ?? ?????c bi???t ????? giao h??ng."></textarea>
                                    </div>
                                </div>
                                <div class="checkbox-form">
                                    <h4><i style="color: #479bf3" class="fa fa-credit-card"></i> Ch???n h??nh th???c thanh to??n</h4>
                                    <div class="row payment-options">
                                        <div class="col-md-12">

                                        </div>
{{--                                        @php--}}
{{--                                            $vnd_to_usd= (Session::get('cart')->totalPrice)/23083;--}}
{{--                                        @endphp--}}
                                        <div class="col-md-12">
                                            <div class="checkout-form-list" id="paypal-button">
                                                {{--t???o input ko hi???n th??? ki???u type="hidden" value mang gi?? tr??? l?? {round($vnd_to_usd,2)}}  ph???y (,) 2 l?? l??m tr??n 2 ch??? s??? --}}
                                                <input type="hidden" id="vnd_to_usd"
{{--                                                       value="{{round($vnd_to_usd,2)}}"--}}
                                                >
                                                {{--                                        <label>H??? v?? t??n <span class="required">*</span></label>--}}
                                                <label><input name="payment_select" class="payment_select" value="0" type="checkbox">Thanh to??n online b???ng V?? ??i???n t???  <span class="required"><h4><i style="color: #479bf3" class="fa fa-cc-paypal"></i></h4></span> </label>
                                            </div>
{{--                                            <div c>--}}

{{--                                            </div>--}}
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label><input name="payment_select" value="1" type="checkbox">Giao h??ng v?? thu ti???n t???i nh?? </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            {{--                                    <div class="checkout-form-list">--}}
                                            {{--                                        <label>?????a ch??? nh???n h??ng <span class="required">*</span></label>--}}
                                            {{--                                        <input type="text" name="shipping_address" class="shipping_address" placeholder="Nh???p ?????a ch???">--}}
                                            {{--                                    </div>--}}
                                        </div>

                                        {{--                                <div class="col-md-4">--}}
                                        {{--                                    <div class="checkout-form-list">--}}
                                        {{--                                        <label>Ch???n Th??nh Ph???</label>--}}
                                        {{--                                        <select class="nice-select select-search-category choose city" name="city" id="city">--}}
                                        {{--                                            <option value="">t???nh th??nh ph???</option>--}}
                                        {{--                                            @foreach($city as $key => $ci)--}}
                                        {{--                                                <option value="{{$ci->matp}}">{{$ci->name_city}}</option>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </select>--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}
                                        {{--                                <div class="col-md-4">--}}
                                        {{--                                    <div class="checkout-form-list">--}}
                                        {{--                                        <label>Ch???n qu???n huy???n</label>--}}
                                        {{--                                        <select class="nice-select select-search-category province choose" name="province" id="province">--}}
                                        {{--                                            <option value="">qu???n huy???n</option>--}}
                                        {{--                                        </select>--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}
                                        {{--                                <div class="col-md-4">--}}
                                        {{--                                    <div class="checkout-form-list">--}}
                                        {{--                                        <label>Ch??? x?? ph?????ng</label>--}}
                                        {{--                                        <select class="nice-select select-search-category wards"  name="wards" id="wards">--}}
                                        {{--                                            <option value="">x?? ph?????ng</option>--}}
                                        {{--                                        </select>--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}
                                        {{--                                <div class="col-md-12">--}}
                                        {{--                                    <div class="checkout-form-list">--}}
                                        {{--                                        <input name="shipping_address"  placeholder="S??? nh??, t??n ???????ng,th??n, x??m, kh??m, ???p" type="text">--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}
                                        <div class="col-md-12 order-notes">
                                            {{--                                    <div class="checkout-form-list">--}}
                                            {{--                                        <label>Ghi ch?? <span class="required">*</span></label>--}}
                                            {{--                                        <textarea id="checkout-mess" name="shipping_notes" cols="30" rows="10" placeholder="????? l???i l???i nh???n cho LIMUPA (n???u c??)"></textarea>--}}
                                            {{--                                    </div>--}}
                                        </div>

                                    </div>

                                </div>
                                <div  class="col-md-6 order-button-payment">
                                     <input type="button" style="margin-left: 120px; margin-bottom: 5px; margin-top: 3px"  value="G???i ????n H??ng"  name="send_order" class="send_order">

                                </div>
                                <div class="col-md-12">

                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <h5>
                                        <label>Qu?? kh??ch c?? th??? ch???n h??nh th???c thanh to??n, h??a ????n VAT sau khi G???i ????n h??ng</label>

                                    </h5>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h4><i style="color: #479bf3" class="fa fa-shopping-cart"></i> ????n H??ng </h4>
                        <form action="#" >
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th class="li-product-thumbnail">???nh</th>
                                        <th class="cart-product-name">s???n ph???m</th>
                                        <th class="li-product-price">G??a</th>
                                        <th class="li-product-quantity">S??? l?????ng</th>
                                        <th class="li-product-subtotal">T???ng</th>
                                        <th class="li-product-remove">L??u</th>
                                        <th class="li-product-remove">X??a</th>

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
                                                        class="amount">{{ number_format($item['item']->price)}} VN?? </span></td>
                                                <td class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input data-i="{{$item['item']->product_id}}"  id="quanty-item-{{$item['item']->product_id}}" class="cart-plus-minus-box" value="{{$item['quanty']}}" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{ number_format($item['price'])}} VN?? </span>
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
                                        {{--Vi???c ki???m tra tr??nh cho gi??? h??ng c???a m??nh ko t???n t???i --}}
                                        @if(Session::has('cart') != null )
                                            <h5>T???ng s??? gi??? h??ng:</h5>
                                            <ul>
                                                <li style="padding-left: 2px " >T???ng s??? l?????ng:<span>{{Session::get('cart')->totalQuanty}}</span></li>
                                                <li style="padding-left: 2px ">T???ng Ti???n: <span>{{ number_format(Session::get('cart')->totalPrice)}} VN??</span></li>
                                            </ul>
{{--                                            <a href="{{URL::to('/login-checkout')}}">Ti???n h??nh ki???m tra</a>--}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
{{--                        <div class="payment-method">--}}
{{--                            <div class="payment-accordion">--}}
{{--                                <div id="accordion">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="#payment-1">--}}
{{--                                            <h5 class="panel-title">--}}
{{--                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--                                                    Direct Bank Transfer.--}}
{{--                                                </a>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won???t be shipped until the funds have cleared in our account.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="#payment-2">--}}
{{--                                            <h5 class="panel-title">--}}
{{--                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
{{--                                                    Cheque Payment--}}
{{--                                                </a>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won???t be shipped until the funds have cleared in our account.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-header" id="#payment-3">--}}
{{--                                            <h5 class="panel-title">--}}
{{--                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                                                    PayPal--}}
{{--                                                </a>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapseThree" class="collapse" data-parent="#accordion">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won???t be shipped until the funds have cleared in our account.</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="order-button-payment">--}}
{{--                                    <input value="Place order" type="submit">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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

