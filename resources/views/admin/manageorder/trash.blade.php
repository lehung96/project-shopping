@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Xóa mềm ', 'key' => 'Danh Sách'])

        <div class="content">
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

{{--                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right m-2">Thêm</a>--}}

                    </div>
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
                            @foreach($orders_trash as $key => $order)
                                {{-- mỗi lần lặp foreach từ 0 tăng lên 1 --}}
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    {{--                                    <td><i>{{$i}}</i></label></td>--}}
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$orders_trash->order_code}}</td>
                                    <td>{{$orders_trash->created_at}}</td>

                                    {{-- nếu $order = 1 là đơn hàng mới   --}}
                                    <td>@if($orders_trash->order_status==1)
                                            Đơn hàng mới
                                        @else
                                            Đã xử lý - Đã giao hàng
                                        @endif
                                    </td>
                                    <td>
                                        {{-- view-order sau đó gửi vào cái order_code --}}
                                        {{-- lấy order_code của bảng order để so sánh order_code của bảng order_detail
                                        để lấy ra được sản phẩm tương ứng--}}
                                        <a href="{{URL::to('/view-order/'.$orders_trash->order_code)}}"
                                           class="btn btn-default">Xem</a>
                                        <a href="{{ route('delete.order',$orders_trash->order_code) }}"
                                           {{--                                           data-url="{{ route('orders.delete',['order_code'=>$pro->order_code]) }}"--}}
                                           class="btn btn-danger ">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $orders_trash->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


