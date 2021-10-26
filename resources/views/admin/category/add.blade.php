@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'category', 'key' => 'Add'])
        <div class="col-md-12">
{{--                                    @if ($errors->any())--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
        </div>
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
                    <div class="col-md-6 offset-3">
                        {{-- form này phương thức là post và gửi đường dẫn đến {{ route('categories.store') }} --}}
                        <form action="{{ route('categories.store') }}" method="post">
                            {{-- form có @csrf để bảo mật form --}}
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="Nhập tên danh mục"
                                       value="{{ old('name') }}"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>

                                <input type="text" name="category_slug" class="form-control @error('category_slug') is-invalid @enderror" id="convert_slug" placeholder="Tên slug"
                                       value="{{ old('category_slug') }}">
                                @error('category_slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                {{-- biến name dùng để insert csdl --}}
                                <textarea style="resize: none" rows="8" class="form-control @error('category_desc') is-invalid @enderror" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ old('category_desc') }}</textarea>
                                @error('category_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                {{-- biến name dùng để insert csdl --}}
                                <textarea style="resize: none" rows="8" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" id="exampleInputPassword1" placeholder="Từ khóa danh mục">{{ old('meta_keywords') }}</textarea>
                                @error('meta_keywords')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="exampleInputPassword1">Từ khóa danh mục</label>--}}
{{--                                <textarea style="resize: none" rows="8" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="category_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị </option>
                                    <option value="1">Ẩn</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục cha</label>
                                <select class="form-control select2_init @error('parent_id') is-invalid @enderror" name="parent_id">
                                    {{--option nếu chon option giá trị = 0 là tra lớn nhất rồi --}}
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" name="add_category" class="btn btn-primary">Thêm Danh Mục</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
