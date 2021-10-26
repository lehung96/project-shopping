@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'User', 'key' => 'Thêm'])
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
                        <form role="form" action="{{URL::to('store-users')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên users</label>
                                <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" placeholder="Tên user">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="admin_phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" name="admin_password" class="form-control" id="exampleInputEmail1" placeholder="mật khẩu">
                            </div>

                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm users</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
