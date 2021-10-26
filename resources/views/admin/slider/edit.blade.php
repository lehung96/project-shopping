@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Slider', 'key' => 'sửa'])
        <form action="{{ route('slider.update', ['id' => $slider->id]) }}" method="post" enctype="multipart/form-data">
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
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên slider</label>
                                <input type="text" name="name" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$slider->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán</label>
                                <input type="text" value="{{$slider->price}}" name="price" class="form-control " id="exampleInputEmail1" id="price_format" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giảm giá </label>
                                <input type="text" value="{{$slider->discount}}" name="discount" class="form-control " id="exampleInputEmail1" id="price_format">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">nội dung & thời gian </label>
                                <input type="text" name="content_time" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$slider->content_time}}">
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image_name"
                                >
                                <div class="col-md-4 feature_image_container">
                                    <div class="row">

                                        <img class="feature_image" src="{{asset('public/uploads/slider/'. $slider->image_name)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả slider</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="description" id="ckeditor2">{{$slider->description}}</textarea>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

