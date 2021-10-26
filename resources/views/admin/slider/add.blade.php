@extends('backend.layout')
@section('main_content')

    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Slider', 'key' => 'Thêm'])
        <div class="col-md-12">
            {{--                        @if ($errors->any())--}}
            {{--                            <div class="alert alert-danger">--}}
            {{--                                <ul>--}}
            {{--                                    @foreach ($errors->all() as $error)--}}
            {{--                                        <li>{{ $error }}</li>--}}
            {{--                                    @endforeach--}}
            {{--                                </ul>--}}
            {{--                            </div>--}}
            {{--                        @endif--}}
        </div>
        <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">{{--đã upload ảnh thêm thuộc tính enctype="multipart/form-data"--}}
            <div class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            {{-- form này phương thức là post và gửi đường dẫn đến {{ route('products.store') }} --}}

                            {{-- form có @csrf để bảo mật form --}}
                            @csrf
                            <div class="form-group">
                                <label>Tên slider </label>
                                <input type="text"
                                       {{-- nếu prodcut_name ko thảo mãn thì required thì sẽ xâu lỗi ra  --}}
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="Nhập tên slide "
                                       value="{{ old('name') }}"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputEmail1">Slug</label>--}}
                            {{--                                <input type="text" name="slug" class="form-control " id="convert_slug" placeholder="Tên slug">--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán</label>
                                <input type="text"   name="price" class="form-control price_format @error('price') is-invalid @enderror" id="" placeholder="Nhập giá"
                                       value="{{ old('price') }}">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giảm giá</label>
                                <input type="text"   name="discount" class="form-control price_format @error('discount') is-invalid @enderror" id="" placeholder="Nhập giảm giá"
                                       value="{{ old('discount') }}">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>nội dung & thời gian </label>
                                <input type="text"
                                       {{-- nếu prodcut_name ko thảo mãn thì required thì sẽ xâu lỗi ra  --}}
                                       class="form-control @error('content_time') is-invalid @enderror"
                                       name="content_time"
                                       placeholder="Nhập nội dung & thời gian "
                                       value="{{ old('content_time') }}"
                                >
                                @error('content_time')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả slider </label>
                                {{--                                 biến name dùng để insert csdl--}}
                                <textarea style="resize: none" rows="8" class="form-control  @error('description') is-invalid @enderror"  name="description" id="exampleInputPassword1" placeholder="Mô tả slider" >{{ old('description') }}</textarea>

                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                {{-- hình ảnh mặc định nó kiểu file --}}
                                <input type="file" name="image_name" class="form-control-file" id="exampleInputEmail1">
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputEmail1">Ảnh chi tiết</label>--}}
                            {{--                                --}}{{-- hình ảnh mặc định nó kiểu file --}}
                            {{--                                <input type="file" name="image_path[]"  multiple class="form-control-file  mb-2 preview_image_detail" >--}}
                            {{--                                <div class="row image_detail_wrapper">--}}

                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="form-group">--}}
                            {{--                                <label>Nhập tags cho sản phẩm</label>--}}
                            {{--                                <select class="form-control tags_select_choose " name="product_tags[]" multiple="multiple">--}}{{--name tags cho ra nhiều giá trị sẽ để dạng mảng name="product_tags[]" --}}

                            {{--                                </select>--}}
                            {{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Hiển thị</label>--}}
{{--                                <select name="pro_status" class="form-control input-sm m-bot15">--}}
{{--                                    <option value="0">Hiển thị </option>--}}
{{--                                    <option value="1">Ẩn</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                        </div>
{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>--}}
{{--                                <textarea id="my-editor"  style="resize: none" rows="8" class="@error('contents')--}}
{{--                                    is-invalid @enderror form-control tinymce_editor_init " name="contents"   placeholder="Nội dung sản phẩm">--}}
{{--                                {{ old('contents') }}--}}
{{--                            </textarea>--}}
{{--                                @error('contents')--}}
{{--                                <div class="alert alert-danger">{{ $message }}--}}
{{--                                </div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Thêm slider</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection

