@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'category', 'key' => 'Edit'])

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
                  @foreach($edit_category_product as $key => $category)
                    <div class="col-md-6 offset-3">
                        <form action="{{ route('categories.update', ['id' => $category->category_id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{{$category->name}}" onkeyup="ChangeToSlug();" name="name" class="form-control  @error('name') is-invalid @enderror" id="slug" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" value="{{$category->slug}}" name="category_slug" class="form-control  @error('category_slug') is-invalid @enderror" id="convert_slug" >
                                @error('category_slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea style="resize: none" rows="8" class="form-control @error('category_desc') is-invalid @enderror" name="category_desc" id="exampleInputPassword1" >{{$category->desc}}</textarea>
                                @error('category_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                <textarea style="resize: none" rows="8" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" id="exampleInputPassword1" >{{$category->meta_keywords}}</textarea>
                                @error('meta_keywords')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control select2_init" name="parent_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}{{--$htmlOption trong mảng chạy ra category đệ quy--}}
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
