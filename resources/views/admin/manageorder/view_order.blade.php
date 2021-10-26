@extends('backend.layout')
@section('main_content')
    <div class=" table-agile-info offset-3">
        <div class="col-sm-6 offset-3">
            <h4 class="m-0 text-dark ">Thông Tin Đăng Nhập</h4>
        </div>

        <div class="content">
            <?php


            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                {{--                                <th scope="col">ID</th>--}}
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Số điện thoại</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                {{--                                    <th scope="row"></th>--}}
                                {{--Lấy ra một trường dựa vào id --}}
                                <td>{{$customer->customer_name}}</td>
                                <td>{{$customer->customer_phone}}</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class=" table-agile-info offset-3">
        <div class="col-sm-6 offset-3">
            <h4 class="m-0 text-dark ">Thông tin gửi đơn hàng</h4>
        </div>

        {{--        @include('backend.content-header', ['name' => 'Thông tin gửi đơn hàng', 'key' => 'Danh Sách'])--}}

        <div class="content">
            <?php


            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên Khách Hàng</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ghi chú</th>
                                <th>Hình thức thanh toán</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$shipping->shipping_name}}</td>
                                <td>{{$shipping->shipping_address}}</td>
                                <td>{{$shipping->shipping_phone}}</td>
                                <td>{{$shipping->shipping_notes}}</td>
                                {{--kiểm tra hình thức thanh toán
                                nếu $shipping->shipping_method==0 Chuyển khoản và ngược lại--}}
                                <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>


                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>
    <div class=" table-agile-info offset-3">
        <div class="col-sm-6 offset-3">
            <h4 class="m-0 text-dark ">Liệt kê chi tiết đơn hàng</h4>
        </div>


        {{--        @include('backend.content-header', ['name' => 'Liệt kê chi tiết đơn hàng', 'key' => 'Danh Sách'])--}}

        <div class="content">
            <?php


            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng kho còn</th>
                                <th>Số lượng sản phẩm đã được bán</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--Thứ tự --}}
                            @php
                                $i = 0;
                                 $total = 0;
                            @endphp
                            @foreach($order_details as $key => $details)
                                @php
                                    $i++;
                                    $subtotal = $details->product_price*$details->product_sales_quantity;
                                    $total+=$subtotal;//hoặc  $total=$subtotal+ $subtotal;
                                @endphp
                                {{--<tr> là dòng --}}
                                {{--thêm class mang theo giá trị product_id class="color_qty_{{$details->product_id}} --}}
                                <tr class="color_qty_{{$details->product_id}}">

                                    <th scope="row">{{$i}}</th>{{-- in ra Thứ tự --}}
                                    {{-- td là cột --}}
                                    <td>{{$details->product_name}}</td>
                                    <td>{{$details->product->product_quantity}}</td>{{--hiển thị số lượng kho còn --}}
                                    <td>{{$details->product->product_sold}}</td>
                                    @if($details->promontion_price ==0)
                                        <td>{{ number_format($details->product_price,0,',','.') }} đ</td>
                                    @else
                                        <td>{{number_format(((float)$details->product_price*(100-$details->promontion_price))/100)}}
                                            đ
                                        </td>
                                        <td>{{ number_format($details->product_price,0,',','.') }} đ</td>
                                    @endif
                                    <td>
                                        <input style="width: 50px" type="text" class="order_qty_{{$details->product_id}}" value="{{$details->product_sales_quantity}}"
                                               name="product_sales_quantity">


                                        {{--input Thứ 2 này dùng để lấy ra  product_id theo name="order_product_id"
                                         bên phía ajax để so sánh  --}}
                                        <input type="hidden" name="order_product_id" class="order_product_id"
                                               value="{{$details->product_id}}">

                                        {{--input Thứ 3 này dùng để lấy số lượng trong kho tồn đi
                                        so sánh với số lượng khách hàng đặt   --}}
                                        <input type="hidden" name="order_qty_storage"
                                               class="order_qty_storage_{{$details->product_id}}"
                                               {{-- value là số lượng tồn kho của sản phẩm vì vậy sẽ lấy ra giá trị của product_quantity từ
                                               từ bảng product--}}
                                               value="{{$details->product->product_quantity}}">

                                        {{--button dùng ajax để hiển thị thông báo
                                         class="btn btn-default” // Để thêm thuộc tính css cho nút button--}}
{{--                                        <button class="btn btn-default update_quantity_order"--}}
{{--                                                data-product_id="{{$details->product_id}}" name="update_quantity_order">--}}
{{--                                            Cập--}}
{{--                                            nhật--}}
{{--                                        </button>--}}

                                    </td>
                                    <td>{{number_format($subtotal ,0,',','.')}}đ</td>
                                </tr>

                            @endforeach
                            <tr>
                                <td colspan="2">
                                    Thanh toán: {{number_format($total,0,',','.')}}đ
                                </td>
                            </tr>
                            <tr>

                                <td colspan="2">   {{--colspan="2" là 2 cột --}}
                                    {{--colspan="2" là 2 cột --}}
                                    {{--sử dụng foreach cái biến $getorder để lấy ra được tình trạng đơn hàng --}}
                                @foreach($getorder as $key => $or)
                                        {{--Kiểm tra nếu order_status = 1 thì sẽ là đơn hàng mới  --}}
                                        @if($or->order_status==1)
                                    <form method="post">
                                        @csrf
                                        {{--colspan="2" là 2 cột --}}
                                        {{--select option mục đích để xử lý đơn hàng dựa vào order_code để update tình
                                        trạng đơn hàng
                                         ví dụ: tình trạng đơn hàng mới status(trạng thái =1) và update đã giao thì sẽ trừ phần số lượng --}}
                                        {{--sử dụng ajax update select dựa theo class order_details --}}
                                        <select class="form-control order_details">
                                            {{-- mục đích là lấy order_id để so sánh với order_id của bảng order
                                             để update order_status = giá trị value =1 này nghĩa là Chưa xử lý đồng
                                               nghĩa đơn hàng mới --}}
                                            <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                                            <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                                        </select>
                                    </form>
                                        @else  {{--Ngược lại  --}}

                                            <form  method="post">
                                                @csrf {{--trong form có  @csrf là token để kiểm tra chống bảo mật   --}}
                                                <select class="form-control order_details">

                                                    <option disabled id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                                                    <option id="{{$or->order_id}}" selected value="2">Đã xử lý-Đã giao hàng
                                                    </option>

                                                </select>
                                            </form>


                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">In đơn hàng</a>
                    </div>
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



