@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">

        @include('backend.content-header', ['name' => 'Sản Phẩm ', 'key' => 'Danh Sách'])
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="" style=" padding-left: 15px">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Tên sản phẩm...." name="name" value="{{\Request::get('name') }}">
                    </div>

                    <div class="form-group">
                        <select name="names" id="" class="form-control">
                            <option value="">Danh mục</option>
                            @if(isset($htmlOption))
                                @foreach($htmlOption as $cates)
                                    <option value="{{$cates->category_id}}" {{\Request::get('names')== $cates->category_id ? "selected ='selected'" :""}}">{{$cates->name}}</option>
                                    {!! $htmlOption !!}
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="content">
            <a href="{{ route('products.trash') }}"
               {{--                                           data-url=""--}}
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
                    <div class="col-md-12">
                        {{--đưa link vào trong href có phương thức là route và truyền tên name của route vào--}}
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Sản Phẩm</th>
                                <th>Thư viện ảnh</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Gía bán</th>
                                <th scope="col">Gía khuyến mãi</th>
                                <th scope="col">Hình ảnh</th>
{{--                                <th scope="col">Nội dung</th>--}}
                                <th scope="col">Danh mục</th>
                                <th scope="col">Sản phẩm mới</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- sử dung foreach loop để lấy dữ liệu --}}
                            @foreach($products as $key => $pro)

                                <tr>
                                    <th scope="row">{{$pro->product_id}}</th>
                                    <td>{{$pro->product_name}}</td>
                                    {{--  đường dẫn url('/add-gallery/ mang theo product_id .$pro->product_id --}}
{{--                                    <td><a href="{{url('/add-gallery/'.$pro->product_id)}}">Thêm thư viện ảnh</a></td>--}}
                                    <td><a href="{{url('/add-gallery/'.$pro->product_id)}}">Thêm thư viện ảnh</a></td>
                                    <td>{{ $pro->product_quantity }}</td>
                                    <td>{{ number_format($pro->price)}} vnđ</td>
                                    <td>{{ number_format((float)$pro->promontion_price)}} %</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{asset('public/uploads/products/'. $pro->image)}}" alt="">
                                    </td>
{{--                                    <td>{{$pro->content}}</td>--}}

                                    <td> {{ $pro->name }}</td>
                                    <td> {{ $pro->new}}</td>
                                    <td> {{ $pro->views_count }}</td>

                                    {{-- optional trả về danh mục rỗng để ko sinh ra Debug --}}
                                    {{-- nghĩa là ko có cái $productItem->category)->name cài phương thức optional vẫn trả về giá trị null --}}
{{--                                    <td>{{ optional(($pro->category_id}}</td>--}}

                                    {{-- sử dụng number_format để trong laravel có để format tiền tệ  --}}


                                    <td><span class="text-ellipsis">
{{--                                phần hiển thị (active) hoạt động  --}}
{{--                                             nếu $pro->status==0 thì hiển thị  thì sẽ active  (hiển thị) thumb up--}}
                                            <?php

                                            if($pro->status==0){
                                            ?>
                                            {{--unactive nó dựa vào cái id của từng cái danh mục--}}
                                    <a href=""><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>

{{--                                    <a href="{{ route('produc.active',['pro_id'=>$pro->product_id])}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>--}}
                                    <?php
                                            }else{

                                            ?>
                                            {{-- ngược lại $cate->status==1 thì hiển thị active thumb up   --}}
                                    <a href=""><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
{{--                                    <a href="{{ route('products.unactive ',['pro_id'=>$pro->product_id])}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>--}}
                                    <?php
                                            }
                                            ?>


                                </span></td>
                                    <td>
                                        <a href="{{ route('products.edit',['id'=>$pro->product_id]) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href="{{ route('products.delete',['id'=>$pro->product_id]) }}"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!----- Form import data (form nhập dữ liệu từ file Excel )---->
                        <!-----form có url('products.import-csv') url là đường dẫn đến trang ('products.import-csv' phương thức gửi là post)
                        enctype="multipart/form-data" là gửi file---->
                        <form action="{{ route('products.import-csv') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!----và nhận file .xlsx----->
                            <!----Thẻ input này dùng để chon tệp----->
                            <input STYLE="padding-bottom: 10px" type="file" name="file" accept=".xlsx"><br>

                            <input  type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
                        </form>
                        <!----- Form  export data (form xuất dữ liệu ra file Excel)
                        form có url('products.export-csv') url là đường dẫn đến trang ('products.export-csv' phương thức gửi là post)---->
                        <form action="{{ route('products.export-csv') }}" method="POST" STYLE="padding-top: 10px">
                            @csrf
                            <input  type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
                        </form>

                    </div>
                    <div class="col-md-12" STYLE="padding-top: 10px">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


