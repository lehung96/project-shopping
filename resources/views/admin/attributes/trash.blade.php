@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Danh Mục', 'key' => 'Danh Sách'])

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
                                <th scope="col">Tên Danh mục</th>
                                <th scope="col">Mổ tả</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- sử dung foreach loop để lấy dữ liệu --}}
                            @foreach($cate_trash as $key => $cate)
                                <tr>
                                    <th scope="row">{{$cate->category_id}}</th>
                                    <td>{{$cate->name}}</td>
                                    <td>{{$cate->desc}}</td>
                                    <td><span class="text-ellipsis">
                               {{-- phần hiển thị (active) hoạt động  --}}
                                            {{-- nếu $cate->status==0 thì ẩn  thì sẽ active  (hiển thị) thumb dow  --}}
                                            <?php

                                            if($cate->status==0){
                                            ?>
                                            {{--unactive nó dựa vào cái id của từng cái danh mục--}}
                                    <a href="{{ route('categories.unactive',['category_id'=>$cate->category_id])}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                    <?php
                                            }else{

                                            ?>
                                            {{-- ngược lại $cate->status==1 thì hiển thị active thumb up   --}}
                                    <a href="{{ route('categories.active',['category_id'=>$cate->category_id])}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                    <?php
                                            }
                                            ?>
                                </span></td>
                                    <td>

                                        <a href="{{ route('categories.untrash',['id'=>$cate->category_id]) }}"
                                           {{--                                           data-url=""--}}
                                           class="btn btn-danger ">Phục Hồi</a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="{{ route('categories.fordel',['id'=>$cate->category_id]) }}"
                                           {{--                                           data-url=""--}}
                                           class="btn btn-danger ">Xóa vĩnh viễn</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $cate_trash->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


