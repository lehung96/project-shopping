@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'products', 'key' => 'Add'])
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
        if ($message) {
            echo '<span class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        <form action="{{ route('products.store') }}" method="post"
              enctype="multipart/form-data">{{--đã upload ảnh thêm thuộc tính enctype="multipart/form-data"--}}
            <div class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            {{-- form này phương thức là post và gửi đường dẫn đến {{ route('products.store') }} --}}

                            {{-- form có @csrf để bảo mật form --}}
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm </label>
                                <input type="text"
                                       {{-- nếu prodcut_name ko thảo mãn thì required thì sẽ xâu lỗi ra  --}}
                                       class="form-control @error('product_name') is-invalid @enderror"
                                       name="product_name"
                                       placeholder="Nhập tên sản phẩm "
                                       value="{{ old('product_name') }}"
                                >
                                @error('product_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SL sản phẩm</label>
                                <input type="text" name="product_quantity"
                                       class="form-control price_format @error('product_quantity') is-invalid @enderror"
                                       id="" placeholder="Điền số lượng"
                                       value="{{ old('product_quantity') }}">
                                @error('product_quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">số lượng đã bán</label>
                                <input type="text" name="product_sold" class="form-control price_format " id=""
                                       placeholder="Nhập số lượng đã bán"
                                >
                                {{--                            @error('price')--}}
                                {{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
                                {{--                            @enderror--}}
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputEmail1">Slug</label>--}}
                            {{--                                <input type="text" name="slug" class="form-control " id="convert_slug" placeholder="Tên slug">--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="length" name="price"
                                       class="form-control price_format @error('price') is-invalid @enderror" id=""
                                       placeholder="Nhập giá"
                                       value="{{ old('price') }}">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                <input type="length" name="promontion_price"
                                       class="form-control price_format @error('promontion_price') is-invalid @enderror"
                                       id="" placeholder="Nhập giá khuyễn mãi"
                                       value="{{ old('promontion_price') }}">
                                @error('promontion_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <form action="">
                                    <label for="exampleInputEmail1">New (new = 1 sản phẩm mới, 0 là sản phẩm trước
                                        đó):</label>
                                    <input type="number" id="quantity" name="new" min="0" max="1">
                                </form>
                            </div>

                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <textarea id="summernotes" style="resize: none" rows="8"
                                                  class="form-control  @error('desc') is-invalid @enderror" name="desc"
                                                  id="exampleInputPassword1"
                                                  placeholder="Mô tả sản phẩm">{{ old('desc') }}
                                        </textarea>
                                        @error('desc')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa sản phẩm </label>
                                {{--                                 biến name dùng để insert csdl--}}
                                <textarea style="resize: none" rows="8"
                                          class="form-control  @error('meta_keywords') is-invalid @enderror"
                                          name="meta_keywords" id="exampleInputPassword1"
                                          placeholder="từ khóa sản phẩm">{{ old('meta_keywords') }}</textarea>

                                @error('meta_keywords')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                {{-- hình ảnh mặc định nó kiểu file --}}
                                <input type="file" name="image" class="form-control-file" id="exampleInputEmail1">
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputEmail1">Ảnh chi tiết</label>--}}
                            {{--                                --}}{{-- hình ảnh mặc định nó kiểu file --}}
                            {{--                                <input type="file" name="image_path[]"  multiple class="form-control-file  mb-2 preview_image_detail" >--}}
                            {{--                                <div class="row image_detail_wrapper">--}}

                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                {{--trong select class="form-control thêm class là select2_init (khởi tạo) --}}
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                    {{--option nếu chon option giá trị rỗng  là tra lớn nhất rồi --}}
                                    <option value="">Chọn danh mục</option>

                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">lượt xem</label>
                                <input type="text" name="views_count" class="form-control price_format " id=""
                                       placeholder="Nhập lượt xem">
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label>Nhập tags cho sản phẩm</label>--}}
                            {{--                                <select class="form-control tags_select_choose " name="product_tags[]" multiple="multiple">--}}{{--name tags cho ra nhiều giá trị sẽ để dạng mảng name="product_tags[]" --}}

                            {{--                                </select>--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="pro_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>

                            <div class="form-group bodercolor ">
                                <label for="exampleInputPassword1">Màu Sắc</label>
                                <div class="checkbox">
                                    @foreach($color as $da_color )
                                        {{--Đầu tiên khi thêm chúng ta phải có cái name="id_attr[]”
                                         và  cái name = giá trị mặc định đặt cho trường id_attr truyền vào bằng 1 mảng[]
                                           bởi vì chúng ta lấy được nhiều trong bảng product_attr--}}
                                        <label> <input type="checkbox" value="{{$da_color->attribute_id}}"
                                                       name="id_attr[]">
                                            {{--<i class="nav-icon fas fa-square"
                             style="color:{{$da_color->value}}"// {{$da_color->value}} này lấy dữ liệu từ thuộc tính màu sắc của bảng attributes ></i>--}}
                                            <i class="nav-icon fas fa-square" style="color:{{$da_color->value}}"></i>
                                        </label>
                                    @endforeach


                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Dung tích</label>
                                <div class="checkbox">
                                    @foreach($capaci as $da_size )
                                        <label> <input type="checkbox" value="{{$da_size->attribute_id}}"
                                                       name="id_attr[]">
                                            {{$da_size->value}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhà sản xuất</label>
                                <div class="checkbox">
                                    @foreach($brand as $da_brand )
                                        <label> <input type="checkbox" value="{{$da_brand->attribute_id}}"
                                                       name="id_attr[]">
                                            {{$da_brand->value}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                        </div>
{{--                        <div class="col-md-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>--}}
{{--                                <textarea id="my-editor" style="resize: none" rows="8" class="@error('contents')--}}
{{--                                    is-invalid @enderror form-control tinymce_editor_init " name="contents"--}}
{{--                                          placeholder="Nội dung sản phẩm">--}}
{{--                                {{ old('contents') }}--}}
{{--                            </textarea>--}}
{{--                                @error('contents')--}}
{{--                                <div class="alert alert-danger">{{ $message }}--}}
{{--                                </div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <section class="content">--}}
{{--                            <div class="row">--}}
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <textarea id="summernote" style="resize: none" rows="8" class="@error('contents')
                                                is-invalid @enderror form-control tinymce_editor_init " name="contents"
                                                      placeholder="Nội dung sản phẩm">
                                                  {{ old('contents') }}
                                            </textarea>
                                            @error('contents')
                                            <div class="alert alert-danger">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
{{--                            </div>--}}
{{--                        </section>--}}
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mb-3">Thêm sản phẩm</button>
                    </div>

                </div>
            </div>
        </form>
    </div>


@endsection
