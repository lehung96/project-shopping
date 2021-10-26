{{--Cái has(“ cart ”) truyền vào cart mình lấy ở bên shopping cart
controller  cái put mình đặt là gì mình lấy theo cái đó
Vì đây là cái key , chúng ta có thể tạo nhiều session khác nhau
cụ thể mình muốn lấy giỏ hàng đặt tên là cái cart
has kiểm tra nó có tồn tại hay ko --}}
@if(Session::has('cart') != null )
    <ul class="minicart-product-list">
        {{--Session::get('cart')->items as  $item  trỏ đến cái items là list sản phẩm --}}
        @foreach(Session::get('cart')->items as  $item)


            <li>
                <a href="single-product.html" class="minicart-product-image">
                    <img class="product_image_105_105" src="{{URL::to('public/uploads/products/'.$item['item']->image)}}" alt="cart products">
                </a>
                <div class="minicart-product-details">
                    <h6><a href="single-product.html">{{$item['item']->product_name}}</a></h6>
                    @if($item['item']->promontion_price ==0)
                        <span>{{ number_format($item['item']->price)}} vnđ x {{$item['quanty']}}</span>
                    @else
                        <span >{{number_format(($item['item']->price*(100-$item['item']->promontion_price))/100)}}vnđ x {{$item['quanty']}}</span>

                    @endif

                </div>
                {{--ở đây bên script  chúng ta lấy từ cái class=s close này và trỏ đến thằng i  <i class="fa fa-close"></i> --}}

                {{-- Cách lấy id  sang bên file script.blade
                Có 1 mẹo là mình đặt 1 data-id="" sau đó truyền vào {{$item['item']->product_id}} --}}
                <button class="close" title="Remove">
                    <i  class="fa fa-close" onclick="delete_cart({{$item['item']->product_id}})"></i>
                </button>
            </li>
        @endforeach
    </ul>
    <p class="minicart-total">TỔNG Tiền :
    <?php $total_price = $total_quantity = 0; ?>
    @foreach(Session::get('cart')->items as  $value)
        <?php
        $total_price += ($value['item']->price * $value['quanty']);
        $total_quantity += $value['quanty'];
        ?>
    @endforeach
   <span>{{ number_format($total_price)}} VNĐ</span>


    {{--Thêm ô input lấy ra được số lượng và tiền --}}
    {{--Tiếp theo đặt một id là total-quanty-cart
    muốn cho input ko hiển thị thì mình thêm thuộc tính là hidden --}}
    <input hidden id="total-price-cart" type="number" value="{{number_format(Session::get('cart')->totalPrice)}}" VNĐ>
    <input hidden id="total-quanty-cart" type="number" value="{{(Session::get('cart')->totalQuanty)}}">



@endif
{{--@endforeach--}}







