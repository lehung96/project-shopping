@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark offset-3">Liệt Kê mã Đơn Hàng tìm kiếm</h3>
        </div>

        <div class="content">
            <a href="{{ route('orders.trash') }}"
               data-url=""
               class="btn btn-danger float-right m-2 ">Thùng rác</a>
            <?php


            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    {{--                    <div class="col-md-12">--}}
                    {{--                        --}}{{--đưa link vào trong href có phương thức là route và truyền tên name của route vào--}}
                    {{--                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Thêm</a>--}}
                    {{--                    </div>--}}
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Thứ tự</th>
                                <th>Mã đơn hàng</th>
                                <th>Ngày tháng đặt hàng</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--  $i = 0; là thứ tự đơn hàng --}}
                            @php
                                $i = 0;
                            @endphp
                            {{-- sử dung foreach loop để lấy dữ liệu --}}
                            @foreach($order_code as $key => $order)
                                {{-- mỗi lần lặp foreach từ 0 tăng lên 1 --}}
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    {{--                                    <td><i>{{$i}}</i></label></td>--}}
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$order->order_code}}</td>
                                    <td>{{$order->created_at}}</td>

                                    {{-- nếu $order = 1 là đơn hàng mới   --}}
                                    <td>@if($order->order_status==1)
                                            Đơn hàng mới
                                        @else
                                            Đã xử lý - Đã giao hàng
                                        @endif
                                    </td>
                                    <td>
                                        {{-- view-order sau đó gửi vào cái order_code --}}
                                        {{-- lấy order_code của bảng order để so sánh order_code của bảng order_detail
                                        để lấy ra được sản phẩm tương ứng--}}
                                        <a href="{{URL::to('/view-order/'.$order->order_code)}}"
                                           class="btn btn-default">Xem</a>
                                        <a href="{{ route('delete.order',$order->order_code) }}"
                                           {{--                                           data-url="{{ route('orders.delete',['order_code'=>$pro->order_code]) }}"--}}
                                           class="btn btn-danger ">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


