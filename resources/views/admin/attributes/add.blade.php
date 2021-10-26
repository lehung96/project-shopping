@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Thuộc tính', 'key' => 'Add'])
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
                        <form action="{{ route('attributes.store') }}" method="post">
                            {{-- form có @csrf để bảo mật form --}}
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên tên thuộc tính</label>
                                <select name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="màu sắc">màu sắc</option>
                                    <option value="DUNG TÍCH NỒI">DUNG TÍCH NỒI</option>
                                    <option value="Nhà sản xuất">Nhà sản xuất</option>

                                </select>
                            </div>
                            <div class="form-group value1">
                                <label>Gía trị</label>
                                <input type="color" class="form-control" name="value" id="v1" placeholder="Nhập giá trị">
                            </div>

                            <div class="form-group value2" style="display: none">{{--display: none dùng để ẩn ô input--}}
                                <label>Gía trị</label>
                                <input type="text" class="form-control" name="" id="v2" placeholder="Nhập giá trị DUNG TÍCH NỒI ( Dưới 5 lít, 5 lít - Dưới 7 lít...)">
                            </div>

                            <div class="form-group value3" style="display: none">
                                <label>Gía trị</label>
                                <input type="text " class="form-control" name="" id="v3" placeholder="Nhập giá trị nhà sản xuất">
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
