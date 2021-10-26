@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Sản phẩm', 'key' => 'sửa'])
        <form action="{{ route('products.update', ['id' => $product->product_id]) }}" method="post"
              enctype="multipart/form-data">
            <div class="content">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" onkeyup="ChangeToSlug();"
                                       id="slug"
                                {{-- Thứ nhất hiển thị hết thông tin của sản phẩm sửa ra form sửa
                                Bằng cách Trong form edit
                                Phải đưa tên sản phẩm sửa ra ô input để người dùng họ nhìn thấy đnag sửa sản phẩm này
                                 :Vậy thì sẽ đưa vào ô input thuộc tính value--}}
                                value="{{$product->product_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SL sản phẩm </label>
                                <input type="text" value="{{$product->product_quantity}}" name="product_quantity"
                                       class="form-control price_format" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">số lượng đã bán</label>
                                <input type="text" name="product_sold" class="form-control price_format " id=""
                                       placeholder="Nhập số lượng đã bán"
                                       value="{{$product->product_sold}}"
                                >
                                {{--                            @error('price')--}}
                                {{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
                                {{--                            @enderror--}}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán </label>
                                <input type="length" value="{{$product->price}}" name="price"
                                       class="form-control price_format" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                <input type="length" value="{{$product->promontion_price}}" name="promontion_price"
                                       class="form-control price_format" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <form action="">
                                    <label for="exampleInputEmail1">New (new = 1 sản phẩm mới, 0 là sản phẩm trước
                                        đó):</label>
                                    <input type="number" id="quantity" value="{{$product->new}}" name="new" min="0"
                                           max="1">
                                </form>
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image"
                                >
                                <div class="col-md-4 feature_image_container">
                                    <div class="row">
                          {{--Có thẻ img thì sẽ hiện thị ra ảnh sản phẩm luôn
                        bằng cách là có URL là đường dẫn to là đến cái thư mục uploads( đặt ảnh sản phẩm
                 ở trong thư mục uploads/proructs/ và hiện thị ra tên ảnh là $product trỏ đến -> trường image --}}
                                        <img class="feature_image"
                                             src="{{URL::to('public/uploads/products/'.$product->image)}}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}{{--$htmlOption trong mảng chạy ra category đệ quy--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">lượt xem</label>
                                <input type="text" name="views_count" class="form-control price_format "
                                       value="{{$product->views_count}}" id="" placeholder="Nhập lượt xem">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="desc"
                                          id="ckeditor2">{{$product->desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa sản phẩm </label>
                                <textarea style="resize: none" rows="8" class="form-control" name="meta_keywords"
                                          id="ckeditor2">{{$product->meta_keywords}}</textarea>
                            </div>
                            <div class="form-group bodercolor ">
                                <label for="exampleInputPassword1">Màu Sắc</label>
                                <div class="checkbox">
                                    @foreach($color as $da_color )
                                        {{--Đầu tiên khi thêm chúng ta phải có cái name="id_attr[]”
                                         và  cái name = giá trị mặc định đặt cho trường id_attr truyền vào bằng 1 mảng[]
                                           bởi vì chúng ta lấy được nhiều trong bảng product_attr--}}
                                        <label> <input type="checkbox" value="{{$da_color->attribute_id}}"
                             {{--Trường Hợp Tiếp theo hiện thị ra Thuộc tính Màu sắc sản phẩm ở from edit product?
                            Bằng cách Sử dụng toán tử 3 ngôi {{()}}
                            --}}
                                 {{--nếu trường hợp $da_color trỏ đến-> productattr_id( của bảng product_attrs) mà ==

                                  --}}
                            {{--Tiếp tục sang bên view tìm đến chỗ màu sắc , vì đang làm về form sửa thuộc tính màu sắc sản phẩm
                                Và toán tử 3 ngồi lúc này chúng ta có in_array($da_color->attribute_id)
                                Và sẽ so khớp với cái arry mà gửi từ ProductController sang đó chính là cái ,$id_attr
                                $id_attr sẽ trả về  giá trị boolean vậy thì sẽ ? nếu là giá trị true thì sẽ cho thuộc tính ‘checked’: vào còn else thì sẽ là dấu ' '
                                --}}
                                    name="id_attr[]" {{(in_array($da_color->attribute_id,$id_attr)?'checked':'')}}>
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
                                                       name="id_attr[]" {{(in_array($da_size->attribute_id,$id_attr)?'checked':'')}}>
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
                                                       name="id_attr[]" {{(in_array($da_brand->attribute_id,$id_attr)?'checked':'')}}>
                                            {{$da_brand->value}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea id="my-editor" name="contents" class="form-control "
                                          rows="8">{{ $product->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mb-3">Cập nhật sản phẩm</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

