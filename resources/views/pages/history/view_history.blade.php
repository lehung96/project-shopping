@extends('fronted.layout')
@section('main_content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area" style="margin-top: 60px">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="active">Lịch sử mua hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-10 mx-auto">
{{--        <div class=" table-agile-info offset-3">--}}
{{--            <div class="col-sm-6 offset-3">--}}
{{--                <h4 class="m-0 text-dark ">Thông Tin Đăng Nhập</h4>--}}
{{--            </div>--}}

{{--            <div class="content">--}}
{{--                <?php--}}


{{--                $message = Session::get('message');--}}
{{--                if ($message) {--}}
{{--                    echo '<span class="text-alert">' . $message . '</span>';--}}
{{--                    Session::put('message', null);--}}
{{--                }--}}
{{--                ?>--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <table class="table">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    --}}{{--                                <th scope="col">ID</th>--}}
{{--                                    <th scope="col">Tên Khách Hàng</th>--}}
{{--                                    <th scope="col">Số điện thoại</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    --}}{{--                                    <th scope="row"></th>--}}
{{--                                    --}}{{--Lấy ra một trường dựa vào id --}}
{{--                                    <td>{{$customer->customer_name}}</td>--}}
{{--                                    <td>{{$customer->customer_phone}}</td>--}}
{{--                                    <td></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
                                            <input style="width: 50px" type="number" min="1" readonly
                                                   class="order_qty_{{$details->product_id}}"
                                                   value="{{$details->product_sales_quantity}}"
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
    </div>
@endsection



