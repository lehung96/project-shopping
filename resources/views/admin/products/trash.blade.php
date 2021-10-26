@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Sản Phẩm ', 'key' => 'Danh Sách'])

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
                                <th scope="col">ID</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh </th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- sử dung foreach loop để lấy dữ liệu --}}
                            @foreach($pro_trash as $key => $pros)
                                <tr>
                                    <th scope="row">{{$pros->product_id}}</th>
                                    <td>{{$pros->product_name}}</td>
                                    <td>{{$pros->price}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{asset('public/uploads/products/'. $pros->image)}}" alt="">
                                    </td>
                                    <td> {{ $pros->name }}</td>
                                    <td><span class="text-ellipsis">
                               {{-- phần hiển thị (active) hoạt động  --}}
                                            {{-- nếu $cate->status==0 thì ẩn  thì sẽ active  (hiển thị) thumb dow  --}}
                                            <?php

                                            if($pros->status==0){
                                            ?>
                                            {{--unactive nó dựa vào cái id của từng cái danh mục--}}
                                    <a href="{{ route('products.unactive',['pro_id'=>$pros->product_id])}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                    <?php
                                            }else{

                                            ?>
                                            {{-- ngược lại $cate->status==1 thì hiển thị active thumb up   --}}
                                    <a href="{{ route('products.active',['pro_id'=>$pros->product_id])}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                    <?php
                                            }
                                            ?>
                                </span></td>
                                    <td>

                                        <a href="{{ route('products.untrash',['id'=>$pros->product_id]) }}"
                                           {{--                                           data-url=""--}}
                                           class="btn btn-danger ">Phục Hồi</a>

                                        <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="{{ route('products.fordel',['id'=>$pros->product_id]) }}"
                                           {{--                                           data-url=""--}}
                                           class="btn btn-danger " style="margin-top: 10px">Xóa vĩnh viễn</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $pro_trash->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


