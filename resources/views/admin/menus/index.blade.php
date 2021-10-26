@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Menu', 'key' => 'Danh Sách'])

        <div class="content">
            <a href="{{ route('menus.trash') }}"
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
                    <div class="col-md-12">
                           {{-- phần  này truyền vào cái route tạo bên web.php <a href="{{ route('menus.create') }}"--}}
                            <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">Thêm</a>

                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Menu</th>
                                <th scope="col">parent_id</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                             sử dung foreach loop để lấy dữ liệu--}}
                            @foreach($menus as $key => $menu)
                            <tr>
                                <th scope="row">{{$menu->id}}</th>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->parent_id}}</td>
{{--                                <td><span class="text-ellipsis">--}}
{{--                                phần hiển thị (active) hoạt động--}}
{{--                                 nếu $cate->status==0 thì ẩn  thì sẽ active  (hiển thị) thumb dow--}}
{{--                                    <?php--}}

{{--                                    if($menu->status==0){--}}
{{--                                    ?>--}}
{{--                                        unactive nó dựa vào cái id của từng cái danh mục--}}
{{--                                    <a href="{{ route('categories.unactive',['category_id'=>$menu->id])}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>--}}
{{--                                    <?php--}}
{{--                                    }else{--}}

{{--                                    ?>--}}
{{--                                         ngược lại $cate->status==1 thì hiển thị active thumb up--}}
{{--                                    <a href="{{ route('categories.active',['category_id'=>$menu->id])}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>--}}
{{--                                    <?php--}}
{{--                                    }--}}
{{--                                    ?>--}}
{{--                                </span></td>--}}
                                <td>
                                        <a href="{{ route('menus.edit',['id'=>$menu->id]) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href="{{ route('menus.delete',['id'=>$menu->id]) }}"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

