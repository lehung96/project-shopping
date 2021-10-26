@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Thêm ', 'key' => 'danh mục bài viết'])

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
                        <form role="form" action="{{URL::to('/save-post')}}" method="post"
                              enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input type="text" name="post_title" data-validation="length"
                                       data-validation-length="min10"
                                       data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" class="form-control"
                                       onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="post_slug" class="form-control" id="convert_slug"
                                       placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="post_desc"
                                          id="summernotes2" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <label for="exampleInputPassword1">Nội dung bài viết</label>
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <textarea style="resize: none" rows="8" class="form-control" name="post_content"
                                                  id="summernotes1" placeholder="Nội dung bài viết ">

                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta từ khóa</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="post_meta_keywords"
                                          id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta nội dung</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="post_meta_desc"
                                          id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục bài viết</label>
                                <select name="cate_post_id" class="form-control input-sm m-bot15 select2_in">
                                    @foreach($cate_post as $key => $cate)
                                        <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>

                                </select>
                            </div>

                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm bài viết
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
