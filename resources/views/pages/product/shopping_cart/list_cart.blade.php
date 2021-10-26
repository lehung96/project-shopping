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
                        <td class="li-product-price">
                            @if($item['item']->promontion_price ==0)
                                <span>{{ number_format($item['item']->price)}} vnđ </span>
                            @else
                                <span >{{number_format(($item['item']->price*(100-$item['item']->promontion_price))/100)}} vnđ</span>

                            @endif

                        <td class="quantity">
                            <label>Quantity</label>
                            <div class="cart-plus-minus">
                                <input data-i="{{$item['item']->product_id}}"  id="quanty-item-{{$item['item']->product_id}}" class="cart-plus-minus-box" value="{{$item['quanty']}}" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </td>

                        <td class="product-subtotal">
                            @if($item['item']->promontion_price ==0)
                                <span class="amount">{{ number_format(($item['item']->price)*($item['quanty']))}} vnđ </span>
                            @else
                                <span class="amount">{{number_format((($item['item']->price*(100-$item['item']->promontion_price))/100)*$item['quanty'])}}vnđ</span>

                            @endif
{{--                            <span class="amount">{{ number_format($item['price'])}} VNĐ </span>--}}

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
{{--            <div class="coupon-all">--}}
{{--                <div class="coupon">--}}
{{--                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code"--}}
{{--                           type="text">--}}
{{--                    <input class="button" name="apply_coupon" value="Áp dụng phiếu giảm giá" type="submit">--}}
{{--                </div>--}}

{{--                <div class="coupon2">--}}
{{--                    <input class="button delete-all" name="update_cart" value="xoá tất cả " type="submit">--}}
{{--                </div>--}}

{{--                <div class="coupon2">--}}
{{--                    <input class="button edit-all" name="update_cart" value="Cập nhật giỏ hàng" type="submit">--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="cart-page-total">
                {{--Việc kiểm tra tránh cho giỏ hàng của mình ko tồn tại --}}
                @if(Session::has('cart') != null )
                    <h2>Tổng số giỏ hàng</h2>
                    <ul>
                        <?php $total_price = $total_quantity = 0; ?>
                        @foreach(Session::get('cart')->items as  $value)
                            <?php
                                $total_price += ($value['item']->price * $value['quanty']);
                                $total_quantity += $value['quanty'];
                            ?>
                        @endforeach
                        <li>Tổng số lượng: <span>{{$total_quantity}}</span></li>
                        <li>Tổng Tiền: <span>{{ number_format($total_price)}} VNĐ</span></li>

                    </ul>
                    <?php
                    //Khi mà đăng ký mình sẽ có customer_id hoặc đăng nhập cũng có customer_id,
                    // mình đặt vào một cái session
                    $customer_id = Session::get('customer_id');
                    //nếu tồn $customer_id thì sẽ đến trang checkout ( nếu có đăng ký rồi thì sẽ là thanh toán luôn )
                    if($customer_id!=NULL){
                    ?>
                    <a href="{{URL::to('/checkout')}}">
                        <span>Tiến hành kiểm tra</span>
                    </a>

                    <?php
                    }else{// ngược lại sẽ đănh nhập
                    ?>
                    <a href="{{URL::to('/login-checkout')}}">
                        <span>Tiến hành kiểm tra</span>
                    </a>
                    <?php
                    }
                    ?>
                @endif
            </div>
        </div>
    </div>
</form>

