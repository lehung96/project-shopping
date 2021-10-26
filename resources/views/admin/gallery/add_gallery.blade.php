@extends('backend.layout')
@section('main_content')
{{--    <div class="content-wrapper">--}}
{{--        @include('backend.content-header', ['name' => 'Thêm thư viện ảnh', 'key' => 'Add'])--}}
{{--        <div class="col-md-12">--}}
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="content">--}}
{{--            <?php--}}
{{--            $message = Session::get('message');--}}
{{--            if ($message) {--}}
{{--                echo '<span class="text-alert">' . $message . '</span>';--}}
{{--                Session::put('message', null);--}}
{{--            }--}}
{{--            ?>--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12 ">--}}
{{--                        form này dùng để thêm hình ảnh gửi tới trang url('/insert-gallery/'.$pro_id)--}}
{{--                        <form action="{{url('/insert-gallery/'.$pro_id)}}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            upload file ảnh--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-3" align="right">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    accept là chỉ chấp nhận file ảnh bất kỳ đuôi nào cũng được accept="image/*" multiple--}}
{{--                                    là được quyền chọ nhiều ảnh--}}
{{--                                    id="file" để bắt lỗi chọn ảnh bên ajax id bên ajax ghi là #file--}}
{{--                                    <input type="file" class="form-control" id="file" name="file[]" accept="image/*"--}}
{{--                                           multiple>--}}
{{--                                    <span id="error_gallery"></span> id="error_gallery để bắt lỗi chọn ảnh bên ajax--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3">--}}
{{--                                    khi click vào tải ảnh thì gửi qua đường dẫn {{url('/insert-gallery/'.$pro_id)}} được--}}
{{--                                    $pro_id và trường name="file[]"--}}
{{--                                    <input type="submit" name="upload" name="taianh" value="Tải ảnh"--}}
{{--                                           class="btn btn-success ">--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <div class="panel-body">--}}
{{--                            <input type="hidden" value="{{$pro_id}}" name="pro_id"--}}
{{--                                   class="pro_id">dựa vào class="pro_id" để bắt sự kiện ajax bên js--}}
{{--                            <form>--}}
{{--                                @csrf--}}

{{--                                //cái id="gallery_load sẽ load table (bang) gallery bên ajax--}}
{{--                                $('#gallery_load').html(data);--}}
{{--                                liệt kê ra hình ảnh--}}

{{--                                <div id="gallery_load">--}}


{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


    <div class="content-wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thư viện ảnh
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <form action="{{url('/insert-gallery/'.$pro_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3" align="right">

                        </div>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                            <span id="error_gallery"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-success ">
                        </div>

                    </div>
                </form>

                <div class="panel-body ">
                    <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                    <form>
                        @csrf
                        <div id="gallery_load">

                        </div>
                    </form>

                </div>
            </section>

        </div>
    </div>

@endsection
