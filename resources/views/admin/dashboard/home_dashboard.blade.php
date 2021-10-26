@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <style type="text/css">
                    p.title_thongke {
                        text-align: center;
                        font-size: 20px;
                        font-weight: bold;
                    }
                </style>
                <p class="title_thongke">Thống kê đơn hàng doanh số</p>

                <form autocomplete="off">
                    @csrf
                    <div class="row">
                        {{--form gửi thông tin ngày tháng--}}
                        <form autocomplete="off">
                            @csrf
                            <div class="col-md-3">
                                <label>Từ ngày:</label>
                                {{--Từ ngày: lọc từ ngày mấy dùng ô input type="text" nhập vào--}}
                                {{-- id="datepicker" nghĩa là khi click vào một cái input sẽ hiện ra một cái lịch--}}
                                {{-- lịch này là lịch của jquerys, phải có một cái id="datepicker" để--}}
                                {{-- jquery dựa vào cid="datepicker" lấy ra cái lịch--}}
                                <input type="text" id="datepicker" class="form-control">
                                {{-- tọa một input kiểu type="button" và cái button mang cái id="btn-dashboard-filter"
                                         khi click vào button lọc ngày tháng cho chúng ta
                                          id="btn-dashboard-filter này dùng bắt sự kiện ajax  class=" btn-sm" là nhỏ
                                          Bên trang dashboard này Hiện tại nút button này là có id là id="btn-dashboard-filter"--}}

                                <label> <input  type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm"
                                                value="Lọc kết quả"></label>
                            </div>

                            <div class="col-md-3">
                                <label>Đến ngày:</label>
                                {{--Đến ngày: lọc từ ngày mấy dùng ô input type="text" nhập vào--}}
                                {{-- id="datepicker2" nghĩa là khi click vào một cái input sẽ hiện ra một cái lịch--}}
                                {{-- lịch này là lịch của jquerys, phải có một cái id="datepicker2"để--}}
                                {{--  jquery dựa vào id="datepicker2" lấy ra cái lịch--}}
                                <input type="text" id="datepicker2" class="form-control">

                            </div>
                         <!-- lọc bằng Ajax  Biểu đồ doanh số theo ngày tuần tháng năm  -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Lọc theo:</label>

                                            <div class="input-group">
                                                <!--dùng class="dashboard-filter" dashboard-filter để gắn ajax vào
                                                -->
                                                <select class="dashboard-filter form-control" >
                                                    <option>--Chọn--</option>
                                                    <option value="7ngay">7 ngày qua</option>
                                                    <option value="thangtruoc">tháng trước</option>
                                                    <option value="thangnay">tháng này</option>
                                                    <option value="365ngayqua">365 ngày qua</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.form group -->
                                </div>
                        </form>

                        {{--cái biểu đồ này hiển thị sẽ dựa vào id id="chart" --}}
                        {{--col-md-12 là 12 cột  mang id = myfirstchart --}}
                        <div class="col-md-12">
                            {{--id="myfirstchart" gửi qua bên hàm //sử dụng biểu đồ Morris.Bar(hình thanh kẹo)
                            chiều cao là 250 px--}}

                            <div id="chart" style="height: 250px;"></div>
                        </div>
                    </div>
                </form>

{{--                <div class="row">--}}
{{--                    <style type="text/css">--}}
{{--                        table.table.table-bordered.table-dark {--}}
{{--                            background: #32383e;--}}
{{--                        }--}}
{{--                        table.table.table-bordered.table-dark tr th {--}}
{{--                            color: #fff;--}}
{{--                        }--}}
{{--                    </style>--}}

{{--                    <p class="title_thongke offset-5">Thống kê truy cập</p>--}}

{{--                    <table class="table table-bordered table-dark">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">Đang online</th>--}}
{{--                            <th scope="col">Tổng tháng trước</th>--}}
{{--                            <th scope="col">Tổng tháng này</th>--}}
{{--                            <th scope="col">Tổng một năm</th>--}}
{{--                            <th scope="col">Tổng truy cập</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>{{$visitor_count}}</td>--}}
{{--                            <td>{{$visitor_last_month_count}}</td>--}}
{{--                            <td>{{$visitor_this_month_count}}</td>--}}
{{--                            <td>{{$visitor_year_count}}</td>--}}
{{--                            <td>{{$visitors_total}}</td>--}}
{{--                        </tr>--}}

{{--                        </tbody>--}}
{{--                    </table>--}}

{{--                </div>--}}

                <div class="row" style="background-color: #93d4e6">

                    <div class="col-md-6 col-xs-12">
                        <p class="title_thongke">Thống kê tổng sản phẩm, đơn hàng, Khách hàng</p>
                        <div id="donut"></div>
                    </div>

                    <!--------------------------->

{{--                    <div class="col-md-4 col-xs-12">--}}
{{--                        <h3>Bài viết xem nhiều</h3>--}}

{{--                        <ol class="list_views">--}}
{{--                            @foreach($post_views as $key => $post)--}}
{{--                                <li>--}}
{{--                                    <a target="_blank" href="{{url('/bai-viet/'.$post->post_slug)}}">{{$post->post_title}} | <span style="color:black">{{$post->post_views}}</span></a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ol>--}}

{{--                    </div>--}}

                    <div class="col-md-6 col-xs-12">
                        <style type="text/css">
                            ol.list_views {
                                margin: 10px 0;
                                color: #fff;
                            }
                            ol.list_views a:hover {
                                color: #2b2a2a;
                                font-weight: 400;
                            }
                        </style>
                        <h3>Sản phẩm xem nhiều</h3>
                        {{--ol là đánh theo số thứ tự  có class="list_views" --}}
                        <ol class="list_views">
                            @foreach($product_views as $key => $pro)
                                <li>
                                    <a target="_blank" href="{{route('products-detail-view',['product_id'=>$pro->product_id])}}">{{$pro->product_name}} | <span style="color:black">{{$pro->views_count}}</span></a>
                                </li>
                            @endforeach
                        </ol>

                    </div>
                </div>
            </div>

            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
