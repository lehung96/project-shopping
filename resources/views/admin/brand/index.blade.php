@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Thương Hiệu', 'key' => 'danh sách'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
{{--                        @can('category-add')--}}
                            <a href="{{ route('brands.create') }}" class="btn btn-success float-right m-2">Add</a>
{{--                        @endcan--}}
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                <tr>
                                    <th>Tên thương hiệu</th>
                                    <th>Slug</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Hiển thị</th>
                                    <th style="width:30px;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_brand_product as $key => $brand_pro)
                                    <tr>
                                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                        <td>{{ $brand_pro->brand_name }}</td>
                                        <td>{{ $brand_pro->slug }}</td>
                                        <td><img src="public/uploads/brand/{{ $brand_pro->brand_image }}" height="100" width="100"></td>
                                        <td><span class="text-ellipsis">
              <?php
                                                if($brand_pro->brand_status==0){
                                                ?>
                <a href="{{URL::to('/unactive-brand-products/'.$brand_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                                                }else{
                                                ?>
                 <a href="{{URL::to('/active-brand-products/'.$brand_pro->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
                                                }
                                                ?>
            </span></td>

                                        <td>

                                            <a href="{{ route('brands.edit',['id'=>$brand_pro->brand_id]) }}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active"></i>sửa</a>
                                            <a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này ko?')" href="{{ route('brands.delete',['id'=>$brand_pro->brand_id]) }}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-times text-danger text"></i>Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
{{--                        {{ $categories->links() }}--}}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
