@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">

        @include('backend.content-header', ['name' => 'Thuộc tính', 'key' => 'Danh Sách'])

        <div class="content">
            <a href="{{ route('categories.trash') }}"
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
                            <a href="{{ route('attributes.create') }}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Thuộc tính</th>
                                <th scope="col">giá trị</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                             sử dung foreach loop để lấy dữ liệu--}}
                            @foreach($attributes as $key => $attribute)
                            <tr>
                                <th scope="row">{{$attribute->attribute_id}}</th>
                                <td>{{$attribute->name}}</td>
                                <td>{{$attribute->value}}</td>

{{--                                <td><span class="text-ellipsis">--}}
{{--                                phần hiển thị (active) hoạt động  --}}
{{--                                 nếu $cate->status==0 thì ẩn  thì sẽ active  (hiển thị) thumb UP  --}}
{{--                                    <?php--}}

{{--                                    if($cate->status==0){--}}
{{--                                    ?>--}}
{{--                                        unactive nó dựa vào cái id của từng cái danh mục--}}
{{--                                    <a href="{{ route('categories.unactive',['category_id'=>$cate->category_id])}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>--}}
{{--                                    <?php--}}
{{--                                    }else{--}}

{{--                                    ?>--}}
{{--                                         ngược lại $cate->status==1 thì hiển thị active thumb up   --}}
{{--                                    <a href="{{ route('categories.active',['category_id'=>$cate->category_id])}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>--}}
{{--                                    <?php--}}
{{--                                    }--}}
{{--                                    ?>--}}
{{--                                </span></td>--}}
                                <td>
                                        <a href="{{ route('attributes.edit',['id'=>$attribute->attribute_id]) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href="{{ route('attributes.delete',['id'=>$attribute->attribute_id]) }}"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                        <!----- Form import data (form nhập dữ liệu từ file Excel )---->--}}
{{--                        <!-----form có url('categories.import-csv') url là đường dẫn đến trang ('categories.import-csv' phương thức gửi là post)--}}
{{--                        enctype="multipart/form-data" là gửi file---->--}}
{{--                        <form action="{{ route('categories.import-csv') }}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <!----và nhận file .xlsx----->--}}
{{--                                <!----Thẻ input này dùng để chon tệp----->--}}
{{--                            <input STYLE="padding-bottom: 10px" type="file" name="file" accept=".xlsx"><br>--}}

{{--                            <input  type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">--}}
{{--                        </form>--}}
{{--                        <!----- Form  export data (form xuất dữ liệu ra file Excel)--}}
{{--                        form có url('categories.export-csv') url là đường dẫn đến trang ('categories.export-csv' phương thức gửi là post)---->--}}
{{--                        <form action="{{ route('categories.export-csv') }}" method="POST" STYLE="padding-top: 10px">--}}
{{--                            @csrf--}}
{{--                            <input  type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">--}}
{{--                        </form>--}}

                    </div>
                    <div class="col-md-12" STYLE="padding-top: 10px">
                        {{  $attributes->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

