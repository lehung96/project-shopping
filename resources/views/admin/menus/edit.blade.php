@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'menu', 'key' => 'Sửa'])

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
                    <div class="col-md-6">
                        {{-- form này phương thức là post và gửi đường dẫn đến {{ route('menus.update') }} --}}
                        <form action="{{ route('menus.update', ['id' => $menuFollowIdEdit->id]) }}" method="post">{{--['id' => $menuFollowIdEdit->id]) $menuFollowIdEdit lấy được function bên edit--}}
                            {{-- form có @csrf để bảo mật form --}}
                            @csrf
                            <div class="form-group">
                                <label>Tên menus</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên menu"
                                       value="{{ $menuFollowIdEdit->name }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>

                                <input type="text" name="slug" value="{{ $menuFollowIdEdit->slug }}" class="form-control" id="convert_slug" placeholder="Tên menu">
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputPassword1">Mô tả menu</label>--}}
                            {{--                                --}}{{-- biến name dùng để insert csdl --}}
                            {{--                                <textarea style="resize: none" rows="8" class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả menu"></textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputPassword1">Từ khóa danh mục</label>--}}
                            {{--                                <textarea style="resize: none" rows="8" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="form-group">--}}
                            {{--                                <label>Chọn danh mục cha</label>--}}
                            {{--                                <select class="form-control" name="parent_id">--}}
                            {{--                                    <option value="0">Chọn danh mục cha</option>--}}

                            {{--                                </select>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label for="exampleInputPassword1">Hiển thị</label>--}}
                            {{--                                <select name="category_status" class="form-control input-sm m-bot15">--}}
                            {{--                                    <option value="0">Hiển thị </option>--}}
                            {{--                                    <option value="1">Ẩn</option>--}}


                            {{--                                </select>--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label>Chọn menus cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>


                            <button type="submit" name="add_category" class="btn btn-primary">Thêm Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
