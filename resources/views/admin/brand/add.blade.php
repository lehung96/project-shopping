@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Thương Hiệu', 'key' => 'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" action="{{route('brands.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="brand_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên thương hiệu ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="brand_slug" class="form-control" id="convert_slug" placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh thương hiệu </label>
                                <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu "></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="brand_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
