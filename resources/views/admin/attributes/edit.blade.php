@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Thuộc tính', 'key' => 'Edit'])

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
                    @foreach($edit_attributes as $key => $edit_attribute)
                        <div class="col-md-6 offset-3">
                            <form action="{{ route('attributes.update', ['id' => $edit_attribute->attribute_id]) }}"
                                  method="post">
                                @csrf

                                <?php

                                if($edit_attribute->name == 'DUNG TÍCH NỒI'){
                                ?>
                                <label for="exampleInputPassword1">Tên tên DUNG TÍCH NỒI</label>
                                <div name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="DUNG TÍCH NỒI">DUNG TÍCH NỒI</option>
                                </div>
                                <br>
                                <div class="form-group value1">
                                    <label>Gía trị</label>
                                    <input type="text" class="form-control" name="value" id="v1"
                                       value="{{$edit_attribute->value}}" placeholder="Nhập giá trị DUNG TÍCH NỒI">
                                </div>

                                <?php
                                }else if ($edit_attribute->name == 'Nhà sản xuất'){

                                ?>
                                <label for="exampleInputPassword1">Tên tên thuộc tính</label>
                                <div name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="Nhà sản xuất">Nhà sản xuất</option>
                                </div>
                                <br>
                                <div class="form-group value1">
                                    <label>Gía trị</label>
                                    <input type="text" class="form-control" name="value" id="v1"
                                           value="{{$edit_attribute->value}}" placeholder="Nhập giá trị">
                                </div>

                                <?php
                                }else{
                                ?>
                                <label for="exampleInputPassword1">Tên tên thuộc tính</label>
                                <div name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="màu sắc">màu sắc</option>
                                </div>
                                <br>
                                <div class="form-group value1">
                                    <label>Gía trị</label>
                                    <input type="color" class="form-control" name="value" id="v1"
                                           value="{{$edit_attribute->value}}" placeholder="Nhập giá trị">
                                </div>
                                <?php
                                }
                                ?>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
