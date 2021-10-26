@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Phục hồi', 'key' => 'Menus'])

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
                                <th scope="col">Tên Menu</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- sử dung foreach loop để lấy dữ liệu --}}
                            @foreach($menu_trash as $key => $menu)
                                <tr>
                                    <th scope="row">{{$menu->id}}</th>
                                    <td>{{$menu->name}}</td>
{{--                                    <td><span class="text-ellipsis">--}}
                               {{-- phần hiển thị (active) hoạt động  --}}
                                            {{-- nếu $cate->status==0 thì ẩn  thì sẽ active  (hiển thị) thumb dow  --}}
{{--                                            <?php--}}

{{--                                            if($cate->status==0){--}}
{{--                                            ?>--}}
{{--                                            --}}{{--unactive nó dựa vào cái id của từng cái danh mục--}}
{{--                                    <a href="{{ route('categories.unactive',['category_id'=>$cate->id])}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>--}}
{{--                                    <?php--}}
{{--                                            }else{--}}

{{--                                            ?>--}}
{{--                                            --}}{{-- ngược lại $cate->status==1 thì hiển thị active thumb up   --}}
{{--                                    <a href="{{ route('categories.active',['category_id'=>$cate->id])}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>--}}
{{--                                    <?php--}}
{{--                                            }--}}
{{--                                            ?>--}}
{{--                                </span></td>--}}
                                    <td>

                                        <a href="{{ route('menus.untrash',['id'=>$menu->id]) }}"
                                           {{--                                           data-url=""--}}
                                           class="btn btn-danger ">Phục Hồi</a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa menu này không?')" href="{{ route('menus.fordel',['id'=>$menu->id]) }}"
                                           {{--                                           data-url=""--}}
                                           class="btn btn-danger ">Xóa vĩnh viễn</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $menu_trash->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


